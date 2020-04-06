<?php

if( isset( $_GET[ 'type' ] ) )
{
	$type = sanitize_text_field( $_GET[ 'type' ] );
	
	if( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
	{
		$data_action_status = false;
		
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
		
		$delivery_types = $wpdb->query( $wpdb->prepare( 'UPDATE mps_delivery_types SET delivery_type = %s, type_description = %s WHERE delivery_type = %s', $delivery_type, $delivery_description, $type ) );
		
		if( $delivery_types )
		{
			$wpdb->query( 'COMMIT' );
			$data_action_status = true;
		}
		else
		{
			$wpdb->query( 'ROLLBACK' );
		}
		
		foreach( $delivery_types_params as $type_param_key => $type_param_value )
		{
			if( $type_param_value != '' )
			{
				$wpdb->query( 'START TRANSACTION' );
				
				$delivery_types_params = $wpdb->query( $wpdb->prepare( 'UPDATE mps_delivery_types_params SET '
										. 'param_value = %s WHERE delivery_type_id = '
										. '( SELECT id FROM mps_delivery_types WHERE delivery_type = %s ) AND param_slug = %s', $type_param_value, $type, $type_param_key ) );
				
				echo $delivery_types_params;
				
				if( $delivery_types_params )
				{
					$wpdb->query( 'COMMIT' );
					$data_action_status = true;
				}
				else
				{
					$delivery_types_params = $wpdb->query( $wpdb->prepare( 'INSERT INTO mps_delivery_types_params ( delivery_type_id, param_slug, param_value ) '
												. 'VALUES ( ( SELECT id FROM mps_delivery_types WHERE delivery_type = %s ), %s, %s )', $type, $type_param_key, $type_param_value ) );
					if( $delivery_types_params )
					{
						$wpdb->query( 'COMMIT' );
						$data_action_status = true;
					}
					else
					{
						$wpdb->query( 'ROLLBACK' );
					}
				}
			}
		}
	}
	
	if( $delivery_type_data = $wpdb->get_results( $wpdb->prepare( 'SELECT mpt.id, mpt.delivery_type, mpt.type_description, mptp.delivery_type_id, mptp.param_slug, mptp.param_value '
								. 'FROM mps_delivery_types as mpt JOIN mps_delivery_types_params as mptp ON mpt.id = mptp.delivery_type_id WHERE mpt.delivery_type = %s', $type ) ) )
	{
		$delivery_type_data_arr = array();
		
		foreach( $delivery_type_data as $delivery_data_object )
		{
			$delivery_type_data_arr[ 'delivery_type' ] = $delivery_data_object->delivery_type;
			$delivery_type_data_arr[ 'type_description' ] = $delivery_data_object->type_description;
			$delivery_type_data_arr[ $delivery_data_object->param_slug ] = $delivery_data_object->param_value;
		}
	}
}