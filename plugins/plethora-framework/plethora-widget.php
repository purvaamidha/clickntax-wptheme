<?php
/*
 ______ _____   _______ _______ _______ _______ ______ _______ 
|   __ \     |_|    ___|_     _|   |   |       |   __ \   _   |
|    __/       |    ___| |   | |       |   -   |      <       |
|___|  |_______|_______| |___| |___|___|_______|___|__|___|___|

P L E T H O R A T H E M E S . C O M 				   (c) 2014

File Description: Controller class for widgets

*/

if ( ! defined( 'ABSPATH' ) ) exit; // NO DIRECT ACCESS 

if ( !class_exists('Plethora_Widget') ) {
 
	/**
	 * @package Plethora Base
	 */

	class Plethora_Widget extends WP_Widget {

        public $widget_class; 

		public function add_widget( $widget_class ) { 

			if ( $widget_class ) { 

				$this->widget_class = $widget_class;

			}

		}



	}
	
 }