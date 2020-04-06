<?php

$query = 'DELETE mps_delivery_types, mps_delivery_types_params '
			. 'FROM mps_delivery_types, mps_delivery_types_params '
			. 'WHERE mps_delivery_types.id = mps_delivery_types_params.delivery_type_id AND mps_delivery_types.id = %d';

if( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' )
{
	if( isset( $_POST[ 'delivery-type-id'] ) )
	{
		foreach( $_POST[ 'delivery-type-id'] as $type_id )
		{
			$type_id = sanitize_text_field( $type_id );
			
			$query = 'DELETE mps_delivery_types, mps_delivery_types_params '
						. 'FROM mps_delivery_types, mps_delivery_types_params '
						. 'WHERE mps_delivery_types.id = mps_delivery_types_params.delivery_type_id AND mps_delivery_types.id = %d';
			
			$wpdb->query( 'START TRANSACTION' );
			
			if( $wpdb->query( $wpdb->prepare( $query, $type_id ) ) )
			{
				$wpdb->query( 'COMMIT' );
			}
			else
			{
				$wpdb->query( 'ROLLBACK' );
			}
		}
	}
}

$deliveryTypesList = $wpdb->get_results( 'SELECT id, delivery_type FROM mps_delivery_types' );