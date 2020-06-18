<div class="locations-button">
	<span class="coption-select-title"><?php echo $params[ 'data_title' ]; ?></span>
	<span class="coption-select-icon fa fa-caret-down float-right"></span>
</div>
<div class="locations-select border-radius-10px" name="<?php echo $params[ 'data_type' ]; ?>">
	<div class="search-location-wrapper">
		<input type="text" name="search_location" placeholder="<?php echo $params[ 'search_title' ]; ?>" class="search-location"/>
	</div>
	<ul class="locations-select-list">
	
		<?php
		
		if( $params[ 'data_type' ] == 'city' )
		{
			foreach( $params[ 'data_list' ] as $data )
			{
				if( isset( $translate_locations_ua_reverse[ strtolower( $data ) ] ) )
				{
			?>
			
					<li data-value="<?php echo strtolower( $data ); ?>" class="locations-select-item"><?php echo isset( $translate_locations_ua_reverse[ strtolower( $data ) ] ) ? trim( $translate_locations_ua_reverse[ strtolower( $data ) ] ) : ''; ?></li>
			
			<?php
				}
			}
		}
		else
		{
							
			$countries_register_list = array();
			
			foreach( $params[ 'data_list' ] as $data )
			{
				if( ! in_array( $data[ 'country' ], $countries_register_list ) )
				{
			?>
					<li data-value="<?php echo strtolower( $data[ 'country' ] ); ?>" class="locations-select-item"><?php echo isset( $translate_locations_ua_reverse[ strtolower( $data[ 'country' ] ) ] ) ? trim( $translate_locations_ua_reverse[ strtolower( $data[ 'country' ] ) ] ) : ''; ?></li>
			<?php
					$countries_register_list[] = $data[ 'country' ];
				}
			}
		
		}
		
		?>
		
	</ul>
</div>