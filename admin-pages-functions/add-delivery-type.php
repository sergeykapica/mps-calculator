<?php

if( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
{
	$delivery_type = sanitize_text_field( $_POST[ 'delivery_type' ] );
	$delivery_description = sanitize_text_field( $_POST[ 'delivery_description' ] );
	$delivery_fuel_increase = sanitize_text_field( $_POST[ 'delivery_fuel_increase' ] );
	$delivery_ethalon_parcels = sanitize_text_field( $_POST[ 'delivery_ethalon_parcels' ] );
	$delivery_ethalon_documents = sanitize_text_field( $_POST[ 'delivery_ethalon_documents' ] );
	$delivery_max_min_price = sanitize_text_field( $_POST[ 'delivery_max_min_price' ] );
	
	$delivery_types_params = array(
		'fuel_increase' => $delivery_fuel_increase,
		'delivery_max_min_price' => $delivery_max_min_price,
		'delivery_ethalon_parcels' => $delivery_ethalon_parcels,
		'delivery_ethalon_documents' => $delivery_ethalon_documents
	);
	
	$wpdb->query( 'START TRANSACTION' );
	
	if( $wpdb->query( $wpdb->prepare( 'INSERT INTO mps_delivery_types ( delivery_type, type_description ) VALUES ( %s, %s )', $delivery_type, $delivery_description ) ) )
	{
		$delivery_type_id = $wpdb->insert_id;
		
		foreach( $delivery_types_params as $type_param_key => $type_param_value )
		{
			if( $type_param_value != '' )
			{
				$deliveryTypesParams = $wpdb->query( $wpdb->prepare( 'INSERT INTO mps_delivery_types_params '
										. '( delivery_type_id, param_slug, param_value ) VALUES ( %d, %s, %s )', $delivery_type_id, $type_param_key, $type_param_value ) );
			}
		}
		
		if( $deliveryTypesParams )
		{
			$wpdb->query( 'COMMIT' );
			
			$data_action_status = true;
		}
	}
	else
	{
		$wpdb->query( 'ROLLBACK' );
		
		$data_action_status = false;
	}
}
