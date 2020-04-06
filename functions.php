<?php

require_once( __DIR__ . '/extra-functionality/Translate.php' );

add_action( 'admin_menu', 'admin_menu_init' );

function admin_menu_init()
{
	add_action( 'admin_head', 'include_styles' );
	add_action( 'admin_enqueue_scripts', 'include_scripts' );
	
	function include_styles()
	{
		wp_enqueue_style( 'auxiliary', get_bloginfo( 'template_url' ) . '/sources/css/auxiliary.css' );
		wp_enqueue_style( 'style', plugins_url( 'mps-calculator/sources/css/style.css' ) );
	}
	
	function include_scripts()
	{
		wp_enqueue_script( 'jquery2', get_bloginfo( 'template_url' ) . '/sources/js/jquery-3.4.1.js' );
	}
	
	global $translate_strings;
	
	require_once( __DIR__ . '/lang/ua.php' );
	
	$translate_strings = Translate::reverse( $translate_strings );
	
	add_menu_page( 'Калькулятор цін', 'Калькулятор цін', 'activate_plugins', 'mps-calculator', function()
	{
		global $wpdb;
		global $translate_strings;
		
		require_once( __DIR__ . '/admin-pages-functions/index.php' );
		require_once( __DIR__ . '/admin-pages/index.php' );
	}, 'none' );
	
	add_submenu_page( null, 'Додати новий тип доставки', '', 'activate_plugins', 'mps-calculator-add-delivery-type', function()
	{
		global $wpdb;
		global $translate_strings;
		
		require_once( __DIR__ . '/admin-pages-functions/add-delivery-type.php' );
		require_once( __DIR__ . '/admin-pages/add-delivery-type.php' );
	} );
	
	add_submenu_page( null, 'Редагувати тип доставки', '', 'activate_plugins', 'mps-calculator-edit-delivery-type', function()
	{
		global $wpdb;
		global $translate_strings;
		
		require_once( __DIR__ . '/admin-pages-functions/edit-delivery-type.php' );
		require_once( __DIR__ . '/admin-pages/edit-delivery-type.php' );
	} );
	
	add_rewrite_rule( 'mps-calculator-edit-delivery-type/(.+)', 'wordpress/wp-admin/admin.php?page=mps-calculator-edit-delivery-type&type=$1' );
}

add_action( 'init', 'init' );

function init()
{
	add_action( 'wp_enqueue_scripts', 'include_head_meta' );
	
	function include_head_meta()
	{
		// include styles
		
		wp_enqueue_style( 'style', get_bloginfo( 'template_url' ) . '/style.css' );
		wp_enqueue_style( 'extra', plugins_url( 'mps-calculator/sources/css/extra.css' ) );
		wp_enqueue_style( 'calculator-our', plugins_url( 'mps-calculator/sources/css/calculator-our.css' ) );
		wp_enqueue_style( 'calculator-standart', plugins_url( 'mps-calculator/sources/css/calculator-standart.css' ) );
		wp_enqueue_style( 'validator', plugins_url( 'mps-calculator/sources/css/validator.css' ) );
		wp_enqueue_style( 'adaptive', plugins_url( 'mps-calculator/sources/css/adaptive.css' ) );
		
		// include scripts
		
		wp_enqueue_script( 'jquery2', get_bloginfo( 'template_url' ) . '/sources/js/jquery-3.4.1.js' );
		wp_enqueue_script( 'calculate', plugins_url( 'mps-calculator/sources/js/calculate.js' ) );
		wp_enqueue_script( 'format-integers', plugins_url( 'mps-calculator/sources/js/format-integers.js' ) );
		wp_enqueue_script( 'template-compilator', plugins_url( 'mps-calculator/sources/js/template-compilator.js' ) );
		wp_enqueue_script( 'validator', plugins_url( 'mps-calculator/sources/js/validator.js' ) );
	}
	
	global $wpdb, $translate_locations_ua_reverse, $translate_locations, $translate_strings;
	
	function translateToLowerCase( $translate_strs )
	{
		$new_arr = array();
		
		foreach( $translate_strs as $ak => $av )
		{
		   $new_arr[ mb_strtolower( $ak ) ] = $av;
		   
		   unset( $translate_strs[ $ak ] );
		}
		
		return $new_arr;
	}
	
	require_once( __DIR__ . '/lang/ua.php' );
	
	$translate_locations_ua = $translate_strings;
	
	require_once( __DIR__ . '/lang/ru.php' );
	
	$translate_locations_ru = $translate_strings;
	
	$translate_strings = array_merge( $translate_locations_ru, $translate_locations_ua );
	
	$translate_locations_ua_reverse = translateToLowerCase( Translate::reverse( $translate_locations_ua ) );
	
	$translate_locations = json_encode( $translate_strings );
	
	require_once( __DIR__ . '/extra-functionality/Calculator.php' );
}