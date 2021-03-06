<?php

/**
 * Twitter-API-PHP : Simple PHP wrapper for the v1.1 API
 * 
 * PHP version 5.3.10
 * 
 * @category Awesomeness
 * @package  Twitter-API-PHP
 * @author   James Mallison <me@j7mbo.co.uk>
 * @license  MIT License
 * @link     http://github.com/j7mbo/twitter-api-php
 */
class Plethora_Module_Twitterapiexchange {

        var $bearer_token,
                
        // Default credentials
        $args = array(
                'consumer_key'       =>        'default_consumer_key',
                'consumer_secret'    =>        'default_consumer_secret'
        ),
        
        // Default type of the resource and cache duration
        $query_args = array(
                'type'               =>        'statuses/user_timeline',
                'cache'              =>        1800
        ),

        $has_error = false;
        
        /**
         * WordPress Twitter API Constructor
         *
         * @param array $args
         */
        public function __construct( $args = array() ) {

            if ( ! is_admin() && !empty($args) ) { 
                
                if ( is_array( $args ) && !empty( $args ) )
                        $this->args = array_merge( $this->args, $args );

                $twitter_bearer_token = class_exists('Plethora_CMS') ? Plethora_CMS::get_option('twitter_bearer_token') : get_option('twitter_bearer_token');
                if ( ! $this->bearer_token = $twitter_bearer_token )
                        $this->bearer_token = $this->get_bearer_token();
            }      
        }
        
        /**
         * Get the token from oauth Twitter API
         *
         * @return string Oauth Token
         */
        private function get_bearer_token() {
                
                $bearer_token_credentials = $this->args['consumer_key'] . ':' . $this->args['consumer_secret'];
                $bearer_token_credentials_64 = base64_encode( $bearer_token_credentials );
                
                $args = array(
                        'method'                =>         'POST',
                        'timeout'               =>         5,
                        'redirection'           =>         5,
                        'httpversion'           =>         '1.0',
                        'blocking'              =>         true,
                        'headers'                =>         array(
                                'Authorization'                =>        'Basic ' . $bearer_token_credentials_64,
                                'Content-Type'                =>         'application/x-www-form-urlencoded;charset=UTF-8',
                                'Accept-Encoding'        =>        'gzip'
                        ),
                        'body'                         => array( 'grant_type'                =>        'client_credentials' ),
                        'cookies'                 =>         array()
                );
                
                $response = wp_remote_post( 'https://api.twitter.com/oauth2/token', $args );
                
                if ( is_wp_error( $response ) || 200 != $response['response']['code'] )
                        return $this->bail( __( 'Can\'t get the bearer token, check your credentials', 'cleanstart' ), $response );
                
                $result = json_decode( $response['body'] );
                
                $is_updated = class_exists('Plethora_CMS') ? Plethora_CMS::update_option('twitter_bearer_token', $result->access_token ) : update_option('twitter_bearer_token', $result->access_token );

                return $result->access_token;
                
        }
        
        /**
         * Query twitter's API
         *
         * @uses $this->get_bearer_token() to retrieve token if not working
         *
         * @param string $query Insert the query in the format "count=1&include_entities=true&include_rts=true&screen_name=micc1983!
         * @param array $query_args Array of arguments: Resource type (string) and cache duration (int)
         * @param bool $stop Stop the query to avoid infinite loop
         *
         * @return bool|object Return an object containing the result
         */
        public function query( $query, $query_args = array(), $stop = false ) {
                
                if ( $this->has_error )
                        return false;
                
                if ( is_array( $query_args ) && !empty( $query_args ) )
                        $this->query_args = array_merge( $this->query_args, $query_args );
                
                $transient_name = 'wta_' . md5( $query );

                if ( false !== ( $data = get_transient( $transient_name ) ) )
                    return json_decode( $data );
                
                $args = array(
                        'method'                =>         'GET',
                        'timeout'                =>         5,
                        'redirection'        =>         5,
                        'httpversion'        =>         '1.0',
                        'blocking'                =>         true,
                        'headers'                =>         array(
                                'Authorization'                =>        'Bearer ' . $this->bearer_token,
                                'Accept-Encoding'        =>        'gzip'
                        ),
                        'body'                         =>         null,
                        'cookies'                 =>         array()
                );
                
                $response = wp_remote_get( 'https://api.twitter.com/1.1/' . $this->query_args['type'] . '.json?' . $query, $args );
                
                if ( is_wp_error( $response ) || 200 != $response['response']['code'] ){
                
                        if ( !$stop ){
                                $this->bearer_token = $this->get_bearer_token();
                                return $this->query( $query, $this->query_args, true );
                        } else {
                                return $this->bail( __( 'Bearer Token is good, check your query', 'cleanstart' ), $response );
                        }
                        
                }

                set_transient( $transient_name, $response['body'], $this->query_args['cache'] );
                
                return json_decode( $response['body'] );
                
        }
        
        /**
         * Let's manage errors
         *
         * WP_DEBUG has to be set to true to show errors
         *
         * @param string $error_text Error message
         * @param string $error_object Server response or wp_error
         */
        private function bail( $error_text, $error_object = '' ) {
                
                $this->has_error = true;
                
                if ( is_wp_error( $error_object ) ){
                        $error_text .= ' - Wp Error: ' . $error_object->get_error_message();
                } elseif ( !empty( $error_object ) && isset( $error_object['response']['message'] ) ) {
                        $error_text .= ' ( Response: ' . $error_object['response']['message'] . ' )';
                }
                
                trigger_error( $error_text , E_USER_NOTICE );
                
        }    

       /** 
       * Returns feature information for several uses by Plethora Core (theme options etc.)
       *
       * @return array
       * @since 1.0
       *
       */
       public static function get_feature_options() {

          $feature_options = array ( 
              'switchable'       => false,
              'options_title'    => 'Twitter API Exchange',
              'options_subtitle' => 'Activate/deactivate Twitter API Exchange module',
              'options_desc'     => 'On deactivation, all settings related to this feature will be removed. However, they will not be deleted permanently.',
            );
          
          return $feature_options;
       }


}
