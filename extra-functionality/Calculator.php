<?php

class Calculator 
{
	static public function get_calculator( $type, $delivery_sub_types = false, $countries_list )
	{
		global $wpdb, $translate_locations_ua_reverse, $translate_locations, $translate_strings;
		
		// get delivery types
		
		if( $type === 'our' )
		{
			if( $delivery_type_data = $wpdb->get_results( 'SELECT mpt.id, mpt.delivery_type, mpt.type_description, mptp.delivery_type_id, mptp.param_slug, mptp.param_value '
								. 'FROM mps_delivery_types as mpt JOIN mps_delivery_types_params as mptp ON mpt.id = mptp.delivery_type_id' ) )
			{
				$delivery_types = self::get_sorted_structure( $delivery_type_data );
				
				require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . '/wordpress/wp-content/plugins/mps-calculator/public-pages/calculator.php' );
			}
		}
		else
		{
			if( $delivery_type_data = $wpdb->get_results( $wpdb->prepare( 'SELECT mpt.id, mpt.delivery_type, mpt.type_description, mptp.delivery_type_id, mptp.param_slug, mptp.param_value '
								. 'FROM mps_delivery_types as mpt JOIN mps_delivery_types_params as mptp ON mpt.id = mptp.delivery_type_id '
								. 'WHERE mpt.delivery_type = %s', $type ) ) )
			{
				$calculate_data = self::get_sorted_structure( $delivery_type_data );
				$calculate_data = array_values( $calculate_data )[ 0 ];
				$citiesList = array();
				
				foreach( $countries_list[ $type ] as $country )
				{
					$citiesList[ mb_strtolower( $country[ 'country' ] ) ][] = mb_strtolower ( $country[ 'city' ] );
				}
				
				require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . '/wordpress/wp-content/plugins/mps-calculator/public-pages/calculator.php' );
			}
		}
	}
	
	static public function get_sorted_structure( $delivery_type_data )
	{
		$delivery_types = array();
			
		foreach( $delivery_type_data as $delivery_data_object )
		{
			if( ! isset( $delivery_types[ $delivery_data_object->id ][ 'delivery_type' ] ) )
			{
				$delivery_types[ $delivery_data_object->id ][ 'delivery_type' ] = $delivery_data_object->delivery_type;
			}
			
			if( ! isset( $delivery_types[ $delivery_data_object->id ][ 'type_description' ] ) )
			{
				$delivery_types[ $delivery_data_object->id ][ 'type_description' ] = $delivery_data_object->type_description;
			}
			
			if( $delivery_data_object->param_slug === 'delivery_ethalon_parcels' )
			{
				$delivery_types[ $delivery_data_object->id ][ 'ethalon_value' ][ 'parcels' ] = $delivery_data_object->param_value;
			}
			else if( $delivery_data_object->param_slug === 'delivery_ethalon_documents' )
			{
				$delivery_types[ $delivery_data_object->id ][ 'ethalon_value' ][ 'documents' ] = $delivery_data_object->param_value;
			}
			else
			{
				$delivery_types[ $delivery_data_object->id ][ $delivery_data_object->param_slug ] = $delivery_data_object->param_value;
			}
		}
		
		return $delivery_types;
	}
	
	static public function format_data( $country_data, $delivery_type )
	{
		
		if( $delivery_type !== 'cargo' )
		{
			$formatted_data = array(
				'country' => $country_data[ 1 ],
				'city' => $country_data[ 0 ],
				'params' => array(
					'min_price' => $country_data[ 2 ],
					'weight_list' => array(
						array(
							'kg' => 20,
							'price' => $country_data[ 3 ],
							'price_for_each_kg' => $country_data[ 4 ]
						),
						
						array(
							'kg' => 30,
							'price' => $country_data[ 5 ],
							'price_for_each_kg' => $country_data[ 6 ]
						),
						
						array(
							'kg' => 45,
							'price' => $country_data[ 7 ],
							'price_for_each_kg' => $country_data[ 8 ]
						),
						
						array(
							'kg' => 61,
							'price' => $country_data[ 9 ],
							'price_for_each_kg' => $country_data[ 10 ]
						),
						
						array(
							'kg' => 100,
							'price' => $country_data[ 11 ],
							'price_for_each_kg' => $country_data[ 12 ]
						),
						
						array(
							'kg' => 200,
							'price' => $country_data[ 13 ],
							'price_for_each_kg' => $country_data[ 14 ]
						),
						
						array(
							'kg' => 250,
							'price' => $country_data[ 15 ],
							'price_for_each_kg' => $country_data[ 16 ]
						),
						
						array(
							'kg' => 300,
							'price' => $country_data[ 17 ],
							'price_for_each_kg' => $country_data[ 18 ]
						),
						
						array(
							'kg' => 400,
							'price' => $country_data[ 19 ],
							'price_for_each_kg' => $country_data[ 20 ]
						),
						
						array(
							'kg' => 500,
							'price' => $country_data[ 21 ],
							'price_for_each_kg' => $country_data[ 22 ]
						),
						
						array(
							'kg' => 600,
							'price' => $country_data[ 23 ],
							'price_for_each_kg' => $country_data[ 24 ]
						),
						
						array(
							'kg' => 700,
							'price' => $country_data[ 25 ],
							'price_for_each_kg' => $country_data[ 26 ]
						),
						
						array(
							'kg' => 800,
							'price' => $country_data[ 27 ],
							'price_for_each_kg' => $country_data[ 28 ]
						),
						
						array(
							'kg' => 900,
							'price' => $country_data[ 29 ],
							'price_for_each_kg' => $country_data[ 30 ]
						)
					),
					'appointment_code' => $country_data[ 31 ],
					'flights' => $country_data[ 32 ],
					'next_carrier' => $country_data[ 33 ],
					'note' => $country_data[ 34 ],
					'aviacompany' => $country_data[ 35 ]
				),
				'delivery_type' => $delivery_type
			);
		}
		else
		{
			$formatted_data = array(
				'country' => $country_data[ 1 ],
				'city' => $country_data[ 0 ],
				'params' => array(
					'min_price' => $country_data[ 2 ],
					'optimal_price' => $country_data[ 3 ],
					'weight_list' => array(
						array(
							'kg' => 45,
							'price' => $country_data[ 4 ]
						),
						
						array(
							'kg' => 100,
							'price' => $country_data[ 5 ]
						),
						
						array(
							'kg' => 250,
							'price' => $country_data[ 6 ]
						),
						
						array(
							'kg' => 500,
							'price' => $country_data[ 7 ]
						),
						
						array(
							'kg' => 1000,
							'price' => $country_data[ 8 ]
						),
						
						array(
							'kg' => 2000,
							'price' => $country_data[ 9 ]
						)
					),
					'appointment_code' => $country_data[ 10 ],
					'flights' => $country_data[ 11 ],
					'next_carrier' => $country_data[ 12 ],
					'note' => $country_data[ 13 ],
					'aviacompany' => $country_data[ 14 ],
				),
				'delivery_type' => $delivery_type
			);
		}
		
		return $formatted_data;
	} 
}