<?php
/*
 * Plugin Name: Калькулятор почтовой службы
 * Description: Вычисление цен доставки
 * Author: Mihaylo
 * Version: 1.0
 */

global $wpdb;

register_activation_hook( __FILE__, 'plugin_activation' );
register_deactivation_hook( __FILE__, 'plugin_deactivation' );

function plugin_activation()
{
	global $wpdb;
	
	$deliveryTypesTableQuery = 
		"CREATE TABLE IF NOT EXISTS mps_delivery_types(
			id INT(10) AUTO_INCREMENT PRIMARY KEY,
			delivery_type VARCHAR(255) NOT NULL,
			type_description VARCHAR(5000) NOT NULL
		) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_bin;";

	$deliveryTypesParamsTableQuery = 
		"CREATE TABLE IF NOT EXISTS mps_delivery_types_params(
			id INT(10) AUTO_INCREMENT PRIMARY KEY,
			delivery_type_id INT(10) NOT NULL,
			param_slug VARCHAR(255) NOT NULL,
			param_value TEXT(10000) NOT NULL
		) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_bin;";

	$wpdb->query( 'START TRANSACTION' );
	
	if( $wpdb->query( $deliveryTypesTableQuery ) && $wpdb->query( $deliveryTypesParamsTableQuery ) )
	{
		$wpdb->query( 'COMMIT' );
	}
	else
	{
		$wpdb->query( 'ROLLBACK' );
	}
}

function plugin_deactivation()
{
	global $wpdb;
	
	$pluginTablesDeleteQuery =
	"DROP TABLE IF EXISTS mps_delivery_types, mps_delivery_types_params";
	
	$wpdb->query( $pluginTablesDeleteQuery );
}

require_once( __DIR__ . '/functions.php' );