<?php
/*
 ______ _____   _______ _______ _______ _______ ______ _______ 
|   __ \     |_|    ___|_     _|   |   |       |   __ \   _   |
|    __/       |    ___| |   | |       |   -   |      <       |
|___|  |_______|_______| |___| |___|___|_______|___|__|___|___|

P L E T H O R A T H E M E S . C O M                    (c) 2014

File Description: Post Options Metabox ( Post Format: Image )

*/

if ( ! defined( 'ABSPATH' ) ) exit; // NO DIRECT ACCESS 

if ( class_exists('Plethora_Metabox') && !class_exists('Plethora_Metabox_Postaudio') ): 

	/**
	 * @package Plethora Framework
	 */

	class Plethora_Metabox_Postaudio {

		public static function metabox(){

	    $sections = array();

	    $sections[] = array(
	        'icon_class'    => 'icon-large',
	        'icon'          => 'el-icon-website',
	        'fields'        => array(


				array(
					'id'=> PLETHORA_META_PREFIX .'content-audio',
					'type' => 'text', 
					'title' => __('Audio Link', 'cleanstart'),
					'desc' => __('Enter audio url/share link from: <strong>SoundCloud | Spotify | Rdio </strong>', 'cleanstart'),
					'validate' => 'url',
					),

	        )
	    );




	    $metabox = array(
	        'id'            => 'formatdiv-audio',
	        'title'         => __( 'Featured Audio', 'cleanstart' ),
	        'post_types'    => array( 'post'),
	        'post_format'    => array( 'audio'),
	        'position'      => 'side', // normal, advanced, side
	        'priority'      => 'high', // high, core, default, low
	        'sections'      => $sections,
	    );



	    return $metabox;
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
              'switchable' => true,
              'options_title' => 'Metabox // Post Options ( Post Format: Video )',
              'options_subtitle' => 'Activate/deactivate post metabox fields',
              'options_desc' => 'On deactivation, this metabox will not be available. CAREFULL, you should know what you are doing here!',
              'version' => '1.0',
            );
          
          return $feature_options;
       }


	}

endif;