<?php
/*
 ______ _____   _______ _______ _______ _______ ______ _______ 
|   __ \     |_|    ___|_     _|   |   |       |   __ \   _   |
|    __/       |    ___| |   | |       |   -   |      <       |
|___|  |_______|_______| |___| |___|___|_______|___|__|___|___|

P L E T H O R A T H E M E S . C O M                    (c) 2014

File Description: Metabox class for slider CPT

*/

if ( ! defined( 'ABSPATH' ) ) exit; // NO DIRECT ACCESS 

if ( class_exists('Plethora_Metabox') && !class_exists('Plethora_Metabox_Portfolio') ): 

	/**
	 * @package Plethora Framework
	 */

	class Plethora_Metabox_Portfolio {

		public static function metabox(){

	    $sections = array();
    	$sections[] = array(
	        'title' => __('Content Display', 'cleanstart'),
	        'desc' => __('Empty fields will not be displayed.', 'cleanstart') . ' <a href="'. admin_url('admin.php?page=cleanstart_options&tab=7') . '" target="_blank">'. __('Click here', 'cleanstart') . '</a>'. __(' to edit default values.', 'cleanstart'),
	        'icon_class'    => 'icon-large',
	        'icon' => 'el-icon-info-sign',
	        'fields'        => array(


				// ok!
				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-title-oncontent',
					'type' => 'button_set', 
					'title' => __('Show Title On Content', 'cleanstart'),
					'desc' => __('Might want to hide this if you have chosen to display the title on head panel', 'cleanstart'),
					'options' => array(
							'display' => 'Display',
							'hide' => 'Hide',
							),
					),	

				// ok!
				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-infofields-box',
					'type' => 'button_set', 
					'title' => __('Show Info Fields Box', 'cleanstart'),
					'options' => array(
							'display' => 'Display',
							'hide' => 'Hide',
							),
					),	

				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-infofields',
				    'type'     => 'textarea',
					'title' => __('Info Fields', 'cleanstart'), 
				    'desc'     => __('Place anything here, but we would advise you to keep the default HTML structure!', 'cleanstart'),
					),


				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-rating',
					'type' => 'slider', 
					'title' => __('Rating', 'cleanstart'),
					'desc' => 'Set it to 0, if you want this not to be displayed',
					"default" 	=> "0",
					"min" 		=> "0",
					"step"		=> "1",
					"max" 		=> "10",
					),

				// ok!
				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-site-title',
					'type' => 'text',
					'title' => __('Link button title', 'cleanstart'),
					),	

				// ok! 
				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-site-url',
					'type' => 'text',
					'title' => __('Link button url', 'cleanstart'),
					),	

				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-navbuttons',
					'type' => 'button_set',
					'title' => __('Navigation Buttons', 'cleanstart'), 
					'options' => array(
							'display' => 'display',
							'hide' => 'hide',
							),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-related',
					'type' => 'button_set',
					'title' => __('Related Portfolio Items', 'cleanstart'), 
					'options' => array(
							'display' => 'display',
							'hide' => 'hide',
							),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'portfolio-related-results',
					'required' => array(PLETHORA_META_PREFIX .'portfolio-related','=','display'),						
					'type' => 'spinner', 
					'desc'=> __('Max: 18 items', 'cleanstart'),
					'title' => __('Related Portfolio Items Results', 'cleanstart'),
					"min" 		=> "1",
					"step"		=> "1",
					"max" 		=> "18",
					),


			)
        );

	    $sections[] = array(
	        'title'         => __('Head Panel', 'cleanstart'),
	        'icon_class'    => 'icon-large',
	        'desc' => ' <a href="'. admin_url('admin.php?page=cleanstart_options&tab=3') . '" target="_blank">'. __('Click here', 'cleanstart') . '</a>'. __(' to edit default head panel options.', 'cleanstart'),
	        'icon'          => 'el-icon-website',
	        'fields'        => array(

				array(
					'id'=> PLETHORA_META_PREFIX .'header-title-type-portfolio',
					'type' => 'button_set', 
					'title'    => __('Title / Subtitle Behaviour', 'cleanstart'),
					'description' => __('Notice: if a slider is selected as a background, title/subtitle are set on each slide', 'cleanstart'),
					'options' => array(
							'posttitle'   => 'Portfolio Title/Custom Subtitle',
							'customtitle' => 'Custom Title/Subtitle',
							'notitle'     => 'No Title/Subtitle'
						),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-customtitle-portfolio',
					'type' => 'text', 
					'required' => array( PLETHORA_META_PREFIX .'header-title-type-portfolio','=', array('customtitle')),
					'title' => __('Title Text // Custom', 'cleanstart'),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-customsubtitle-portfolio',
					'required' => array( PLETHORA_META_PREFIX .'header-title-type-portfolio','=', array('posttitle','customtitle' )),
					'type' => 'text', 
					'title' => __('Subtitle Text // Custom', 'cleanstart'),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-align',
					'type' => 'typography', 
					'title' => __('Title/Subtitle Text Align', 'cleanstart'),
					'google'=>false, 
					'font-family'=>false, 
					'font-backup'=>false, 
					'font-style'=>false, 
					'font-weight'=>false, 
					'font-size'=>false, 
					'subsets'=>false, 
					'line-height'=>false, 
					'word-spacing'=>false, 
					'letter-spacing'=>false, 
					'text-transform'=>false, 
					'font-backup'=>false, 
					'preview'=>false, 
					'color' => false,
					'output' => array('.hgroup_title h1', '.hgroup_subtitle p'), // An array of CSS selectors to apply this font style to dynamically
					'units'=>'px', 
					),	

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media',
					'type' => 'button_set',
					'title' => __('Background Type', 'cleanstart'), 
					'options' => self::option_revslider_headermedia_buttons(),
					),

				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-dimensions',
					'type'     => 'dimensions',
					'required' => array( PLETHORA_META_PREFIX .'header-media','equals', array('featuredimage', 'otherimage', 'localvideo', 'googlemap')),						
					'width'    => false,
					'title'    => __('Panel Height', 'cleanstart'),
					),			
				array(
					'id'      => PLETHORA_META_PREFIX .'header-media-nomediadimensions',
					'type'    => 'dimensions',
					'required' => array( PLETHORA_META_PREFIX .'header-media','equals', array('nomedia')),						
					'width'   => false,
					'title'   => __('Panel Height', 'cleanstart'),
					),			

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-otherimage',
					'type' => 'media', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('otherimage')),
					'url'=> true,
					'title' => __('Other Image', 'cleanstart'),
					'desc' => __('Upload an image other than your featured image', 'cleanstart'),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-slider',
					'type' => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('slider')),
					'data' => 'posts',
					'title' => __('Select Slider', 'cleanstart'), 
					'desc' => __('Select a slider to be displayed. You should create one first! Slider settings will be applied here too!', 'cleanstart'),
					'args' => array(
						'posts_per_page'   => -1,
						'post_type'        => 'slider', 				
						'suppress_filters' => false)				
					),

				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-revslider',
					'type'     => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('revslider')),
					'title'    => __('Select Revolution Slider', 'cleanstart'), 
					'desc'     => __('Select a Revolution slider to be displayed ( must have Revolution Slider plugin installed, not included with theme )', 'cleanstart'),
					'options'  => method_exists('Plethora_CMS', 'get_revsliders') ? Plethora_CMS::get_revsliders() :  array() ,
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-localvideo',
					'type' => 'media', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('localvideo')),
					'url'=> true,
					'preview' => true,
					'mode' => false,
					'readonly'=> false,
					'title' => __('Local video', 'cleanstart'),
					'desc' => __('Upload a video file ( supported formats: FLV | MP4 | WEBM )', 'cleanstart'),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-localvideo-poster',
					'type' => 'media', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('localvideo')),
					'url'=> true,
					'readonly'=> false,
					'title' => __('Video cover image', 'cleanstart'),
					'desc'     => __('Set a cover image for this video. It MUST have a 16x9 proportion to display properly ', 'cleanstart'),
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-localvideo-controls',
					'type' => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('localvideo')),
					'title' => __('Video controls', 'cleanstart'),
					'desc'=> __('Click \'Off\' if you want to hide video controls', 'cleanstart'),
					'options' => array( 'true' => 'On', 'false' => 'Off' ),
					'default' => 'true',
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-localvideo-sound',
					'type' => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('localvideo')),
					'title' => __('Video sound', 'cleanstart'),
					'desc'=> __('Click \'Off\' if you want this video to be silent', 'cleanstart'),
					'options' => array( 'true' => 'On', 'false' => 'Off' ),
					'default' => 'false',
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-localvideo-autoplay',
					'type' => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('localvideo')),
					'title' => __('Video autoplay', 'cleanstart'),
					'desc'=> __('Click \'On\' if you want this video to start automatically', 'cleanstart'),
					'options' => array( 'true' => 'On', 'false' => 'Off' ),
					'default' => 'false',
					),

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-localvideo-loop',
					'type' => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('localvideo')),
					'title' => __('Video loop', 'cleanstart'),
					'desc'=> __('Click \'On\' if you want this video to loop', 'cleanstart'),
					'options' => array( 'true' => 'On', 'false' => 'Off' ),
					'default' => 'false',
					),

				/*** GOOGLE MAPS ***/

				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-map-lang',
					'type' => 'text', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title' => __('Map Latitude', 'cleanstart'),
					'desc'=> __('Example:', 'cleanstart') .'<strong>51.50852</strong>. Use <a href="http://www.latlong.net/" target="_blank">LatLong</a> to find easily your location coords.',
					),
				array(
					'id'=> PLETHORA_META_PREFIX .'header-media-map-long',
					'type' => 'text', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title' => __('Map Longtitude', 'cleanstart'),
					'desc'=> __('Example:', 'cleanstart') .'<strong>-0.1254</strong>. Use <a href="http://www.latlong.net/" target="_blank">LatLong</a> to find easily your location coords.',
					),
				/*** MAP TYPE CONTROLS ***/
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-type',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Map Type', 'cleanstart'),
					'options'  => array( 'ROADMAP' => 'ROADMAP', 'SATELLITE' => 'SATELLITE', 'TERRAIN' => 'TERRAIN', 'HYBRID' => 'HYBRID' ),
					'default'  => 'TERRAIN',
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-type-switch',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Show Map Type Switcher', 'cleanstart'),
					'desc'     => __('Show Map Type Switcher', 'cleanstart'),
					'options'  => array( 'true' => 'On', 'false' => 'Off' ),
					'default'  => 'false',
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-type-switch-style',
					'type'     => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media-map-type-switch','=', array('true')),
					'title'    => __('Select MapType Switcher Style', 'cleanstart'), 
					'desc'     => __('Select the display style of the MapType Switcher button', 'cleanstart'),
					'options' => array( 
						'HORIZONTAL_BAR' => 'Horizontal Bar', 
						'DROPDOWN_MENU'  => 'Dropdown Menu',
						'DEFAULT'        => 'Default'
						),
					'default' => 'DROPDOWN_MENU'
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-type-switch-position',
					'type'     => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media-map-type-switch','=', array('true')),
					'title'    => __('Select MapType Switcher Style', 'cleanstart'), 
					'desc'     => __('Select the position of the MapType Switcher button. <a href="https://developers.google.com/maps/documentation/javascript/images/control-positions.png" target="_blank"></a>', 'cleanstart'),
					'options'  => array(
						"TOP_LEFT"      => "Top Left",
						"TOP_CENTER"    => "Top Center",
						"TOP_RIGHT"     => "Top Right",
						"LEFT_CENTER"   => "Center Left",
						"RIGHT_CENTER"  => "Center Right",
						"LEFT_BOTTOM"   => "Bottom Left",
						"BOTTOM_CENTER" => "Bottom Center",
						"BOTTOM_RIGHT"  => "Bottom Right",
						),
					'default'  => 'RIGHT_CENTER'
					),
				/*** MAP ZOOM CONTROLS ***/
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-zoom',
					'type'     => 'slider', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Map Zoom', 'cleanstart'),
					"default"  => "12",
					"min"      => "1",
					"step"     => "1",
					"max"      => "18",
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-zoom-control',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Show Map Zoom Controls', 'cleanstart'),
					'desc'     => __('Show Map Zoom Controlsr', 'cleanstart'),
					'options'  => array( 'true' => 'On', 'false' => 'Off' ),
					'default'  => 'true',
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-zoom-control-style',
					'type'     => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media-map-zoom-control','=', array('true')),
					'title'    => __('Set Zoom Controls Style', 'cleanstart'), 
					'desc'     => __('Select the style of the Zoom Controls', 'cleanstart'),
					'options'  => array(
						"SMALL"   => "Small",
						"LARGE"   => "Large",
						"DEFAULT" => "Default"
						),
					'default'  => 'SMALL'
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-zoom-control-position',
					'type'     => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media-map-zoom-control','=', array('true')),
					'title'    => __('Set Zoom Controls Position', 'cleanstart'), 
					'desc'     => __('Select the <a href="https://developers.google.com/maps/documentation/javascript/images/control-positions.png" target="_blank">position</a> of the Zoom Controls', 'cleanstart'),
					'options'  => array(
						"TOP_LEFT"      => "Top Left",
						"TOP_CENTER"    => "Top Center",
						"TOP_RIGHT"     => "Top Right",
						"LEFT_CENTER"   => "Center Left",
						"RIGHT_CENTER"  => "Center Right",
						"LEFT_BOTTOM"   => "Bottom Left",
						"BOTTOM_CENTER" => "Bottom Center",
						"BOTTOM_RIGHT"  => "Bottom Right",
						),
					'default'  => 'LEFT_CENTER'
					),
				/*** MAP PAN CONTROL OPTIONS ***/
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-pan-control',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Show Map Pan Controls', 'cleanstart'),
					'desc'     => __('Show Map Pan Controlsr', 'cleanstart'),
					'options'  => array( 'true' => 'On', 'false' => 'Off' ),
					'default'  => 'true',
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-pan-control-position',
					'type'     => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media-map-pan-control','=', array('true')),
					'title'    => __('Set Pan Controls Position', 'cleanstart'), 
					'desc'     => __('Select the <a href="https://developers.google.com/maps/documentation/javascript/images/control-positions.png" target="_blank">position</a> of the Pan Controls', 'cleanstart'),
					'options'  => array(
						"TOP_LEFT"      => "Top Left",
						"TOP_CENTER"    => "Top Center",
						"TOP_RIGHT"     => "Top Right",
						"LEFT_CENTER"   => "Center Left",
						"RIGHT_CENTER"  => "Center Right",
						"LEFT_BOTTOM"   => "Bottom Left",
						"BOTTOM_CENTER" => "Bottom Center",
						"BOTTOM_RIGHT"  => "Bottom Right",
						),
					'default'  => 'RIGHT_CENTER'
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-mark',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Map Mark', 'cleanstart'),
					'desc'     => __('Show a mark over the given location', 'cleanstart'),
					'options'  => array( 'true' => 'On', 'false' => 'Off' ),
					'default'  => 'true',
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-controls',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Show controls', 'cleanstart'),
					'desc'     => __('Show pan and zoom controls', 'cleanstart'),
					'options'  => array( 'true' => 'On', 'false' => 'Off' ),
					'default'  => 'true',
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-title',
					'type'     => 'text', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Change Marker Message', 'cleanstart'),
					'desc'     => __('Change Marker Message', 'cleanstart'),
					'default'  => 'We are right here!'
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-icon',
					'type'     => 'media', 
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'url'      => true,
					'title'    => __('Custom Marker Icon', 'cleanstart'),
					'desc'     => __('Upload an image to use as your map marker', 'cleanstart'),
					),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-infowinfow',
					'type'     => 'textarea',
					'title'    => __(' InfoWindow', 'cleanstart'), 
					'subtitle' => __('Display Info Window on Marker click ', 'cleanstart'),
					'desc'     => __('Some HTML is allowed.', 'cleanstart'),
					'validate' => 'html_custom',
					'default'  => 'Some HTML is allowed in here.'
				),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-icon-anchor-x',
				    'type'     => 'spinner',
				    'title'    => __('Anchor X Coordinate', 'cleanstart'),
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
				    'subtitle' => __('Set your custom marker\'s anchor X point', 'cleanstart'),
				    'desc'     => __('Set the X point.', 'cleanstart'),
				    'default'  => '0',
				    'min'      => '0',
				    'step'     => '1',
				    'max'      => '1000',
				),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-icon-anchor-y',
				    'type'     => 'spinner',
				    'title'    => __('Anchor Y Coordinate', 'cleanstart'),
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
				    'subtitle' => __('Set your custom marker\'s anchor Y point', 'cleanstart'),
				    'desc'     => __('Set the Y point.', 'cleanstart'),
				    'default'  => '0',
				    'min'      => '0',
				    'step'     => '1',
				    'max'      => '1000',
				),
				/*** MAP STREETVIEW OPTIONS ***/
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-streetview',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Enable StreetView', 'cleanstart'),
					'desc'     => __('Enable StreetView', 'cleanstart'),
					'options'  => array( 'true' => 'On', 'false' => 'Off' ),
					'default'  => 'false',
				),
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-streetview-position',
					'type'     => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Set StreetView Icon Position', 'cleanstart'), 
					'desc'     => __('Select the <a href="https://developers.google.com/maps/documentation/javascript/images/control-positions.png" target="_blank">position</a> of the StreetView Icon', 'cleanstart'),
					'options'  => array(
						"TOP_LEFT"      => "Top Left",
						"TOP_CENTER"    => "Top Center",
						"TOP_RIGHT"     => "Top Right",
						"LEFT_CENTER"   => "Center Left",
						"RIGHT_CENTER"  => "Center Right",
						"LEFT_BOTTOM"   => "Bottom Left",
						"BOTTOM_CENTER" => "Bottom Center",
						"BOTTOM_RIGHT"  => "Bottom Right",
						),
					'default'  => 'LEFT_CENTER'
					),
				/*** MAP SCALE CONTROL OPTIONS ***/
				array(
					'id'       => PLETHORA_META_PREFIX .'header-media-map-scale-control',
					'type'     => 'button_set',
					'required' => array( PLETHORA_META_PREFIX .'header-media','=', array('googlemap')),
					'title'    => __('Show Map Scale', 'cleanstart'),
					'desc'     => __('Show Map Scale', 'cleanstart'),
					'options'  => array( 'true' => 'On', 'false' => 'Off' ),
					'default'  => 'false',
					),
	        )
	    );


	    $sections[] = array(
	        'title'         => __('Other Elements', 'cleanstart'),
	        'icon_class'    => 'icon-large',
	        'icon'          => 'el-icon-adjust-alt',
	        'fields'        => array(

				// ok! 
				array(
					'id'=>PLETHORA_META_PREFIX .'header-layout',
					'type' => 'select',
					'title' => __('Header layout', 'cleanstart'), 
					'width' => '80%',
					'options' => array('classic' => 'Classic ( logo on the left / menu on the right )', 'centered' => 'Centered ( logo & menu centered )'),//Must provide key => value pairs for radio options
					),
				array( 
					'id'=> PLETHORA_META_PREFIX .'footer-twitterfeed',
					'type' => 'button_set', 
					'title' => __('Twitter feed display', 'cleanstart'),
					'desc'=> __('For further Twitter feed options, please check', 'cleanstart') .'<strong>'. __('Theme Settings > Social & APIs tab', 'cleanstart') .'</strong>',
					'options' => array(
							1 => 'Display',
							0 => 'Hide',
							),
					),	

				// ok!
				array(
					'id'=> PLETHORA_META_PREFIX .'header-triangles',
					'type' => 'button_set', 
					'title' => __('Header Side Corners', 'cleanstart'),
					'options' => array(
							'display' => 'Display',
							'hide' => 'Hide',
							),
					),	

				// ok!
				array(
					'id'=> PLETHORA_META_PREFIX .'footer-triangles',
					'type' => 'button_set', 
					'title' => __('Footer Side Corners', 'cleanstart'),
					'options' => array(
							'display' => 'Display',
							'hide' => 'Hide',
							),
					),	

				array(
					'id'=> PLETHORA_META_PREFIX .'header-toolbar',
					'type' => 'switch', 
					'title' => __('Top toolbar', 'cleanstart'),
					'subtitle' => __('Can be overriden on page/post settings', 'cleanstart'),
					'on' => 'Display',
					'off' => 'Hide',
					),


				array(
					'id'=> PLETHORA_META_PREFIX .'header-toolbar-layout',
					'type' => 'select',
					'required' => array( PLETHORA_META_PREFIX .'header-toolbar','=','1'),						
					'title' => __('Top toolbar layout', 'cleanstart'), 
					'subtitle' => __('Can be overriden on page/post settings', 'cleanstart'),
					'options' => array(
						'1' => 'Menu | Custom Text', 
						'2' => 'Custom Text | Menu', 
						'3' => 'Custom Text Only', 
						),
					),

				array(
					'id'=>PLETHORA_META_PREFIX .'header-toolbar-html',
					'type' => 'textarea',
					'required' => array( PLETHORA_META_PREFIX .'header-toolbar','=','1'),						
					'title' => __('Top toolbar custom text', 'cleanstart'), 
					'subtitle' => __('Can be overriden on page/post settings', 'cleanstart'),
					'desc' => __('HTML tags allowed', 'cleanstart'),
					'validate' => 'html_custom',
					),

				// array( 
				// 	'id'=> PLETHORA_META_PREFIX .'header-toolbar-langswitcher',
				// 	'type' => 'switch', 
				// 	'required' => array( PLETHORA_META_PREFIX .'header-toolbar','=','1'),						
				// 	'title' => __('Language switcher', 'cleanstart'),
				// 	'subtitle'=> __('Can be overriden on page/post settings', 'cleanstart'),
				// 	'description'=> __('Displayed on the right side, only if <strong>WPML</strong> plugin is active.', 'cleanstart'),
				// 	'on' => 'Display',
				// 	'off' => 'Hide',
				// 	),

	        )
	    );


	    $metabox = array(
	        'id'            => 'metabox-portfolio',
	        'title'         => __( 'Portfolio Options', 'cleanstart' ),
	        'post_types'    => array( 'portfolio'),
	        'position'      => 'normal', // normal, advanced, side
	        'priority'      => 'high', // high, core, default, low
	        'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
	        'sections'      => $sections,
	    );



	    return $metabox;
	  }



       /** 
       * Returns alternatuve button selection for header media option, when Rev Slider plugin is installed
       *
       * @return array
       * @since 1.0
       *
       */
		static function option_revslider_headermedia_buttons() {

      		if ( class_exists('RevSliderAdmin')) {
				$return = array(
							'nomedia'       => 'Skin Color',
							'featuredimage' => 'Featured Image',
							'otherimage'    => 'Other Image',
							'slider'        => 'Slider',
							'revslider'     => 'Revolution Slider',
							'localvideo'    => 'Local video',
							'googlemap'     => 'Map',
							);		
			} else { 

				$return = array(
							'nomedia'       => 'Skin Color',
							'featuredimage' => 'Featured Image',
							'otherimage'    => 'Other Image',
							'slider'        => 'Slider',
							'localvideo'    => 'Local video',
							'googlemap'     => 'Map',
							);		
			}

			return $return;
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
              'options_title' => 'Metabox // Portfolio Options',
              'options_subtitle' => 'Activate/deactivate portfolio metabox fields',
              'options_desc' => 'On deactivation, this metabox will not be available. CAREFULL, you should know what you are doing here!',
              'version' => '1.0',
            );
          
          return $feature_options;
       }


	}

endif;