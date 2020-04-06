<?php

if( $type === 'our' )
{

?>
	<div class="calculate border-radius-10px bsizing-border-box float-left">
		<h3 class="calculate-headline float-left"><?php echo $translate_locations_ua_reverse[ 'shipping_cost_calculator' ]; ?></h3>
		<div class="calculate-data border-radius-10px bsizing-border-box float-left">
			<div class="calculate-data-page cdata-page-active">
				<h4 class="calculate-data-headline"><?php echo $translate_locations_ua_reverse[ 'select_location_params' ]; ?></h4>
				<select name="delivery_type" class="calculate-cargo-type border-radius-5px font-size-d8 shadow-light">
					<option value="unselectable"><?php echo $translate_locations_ua_reverse[ 'cargo_type' ]; ?></option>
					
					<?php
					
					if( $delivery_sub_types != false )
					{
						foreach( $delivery_sub_types as $d_type )
						{
						
					?>
							<option value="<?php echo $d_type[ 'slug' ]; ?>" data-delivery-type="<?php echo $d_type[ 'delivery_type' ]; ?>"><?php echo $d_type[ 'title' ]; ?></option>
					<?php
						}
					}
					
					?>
				</select>
				<section class="calculate-section float-left">
					<b class="location-title"><?php echo $translate_locations_ua_reverse[ 'sender' ]; ?></b>
					<div class="location">
						<select name="sender_location_country" class="location-country float-left font-size-d8 border-radius-5px shadow-light">
							<option value="country"><?php echo $translate_locations_ua_reverse[ 'country' ]; ?></option>
							<?php
							
							$countries_register_list = array();
							
							foreach( $countries_list[ 'cargo' ] as $country )
							{
								if( ! in_array( $country[ 'country' ], $countries_register_list ) )
								{
							?>
									<option value="<?php echo strtolower( $country[ 'country' ] ); ?>"><?php echo isset( $translate_locations_ua_reverse[ strtolower( $country[ 'country' ] ) ] ) ? $translate_locations_ua_reverse[ strtolower( $country[ 'country' ] ) ] : ''; ?></option>
							<?php
									$countries_register_list[] = $country[ 'country' ];
								}
							}
							
							?>
						</select>
						<input name="sender_location_city" placeholder="<?php echo $translate_locations_ua_reverse[ "city" ]; ?>" class="location-city float-left font-size-d8 border-radius-5px shadow-light bsizing-border-box"/>
					</div>
				</section>
				<section class="calculate-section float-left">
					<b class="location-title"><?php echo $translate_locations_ua_reverse[ 'receiver' ]; ?></b>
					<div class="location">
						<select name="receiver_location_country" class="location-country float-left font-size-d8 border-radius-5px shadow-light">
							<option value="country"><?php echo $translate_locations_ua_reverse[ 'country' ]; ?></option>
							
							<?php
							
							$countries_register_list = array();
							
							foreach( $countries_list[ 'cargo' ] as $country )
							{
								if( ! in_array( $country[ 'country' ], $countries_register_list ) )
								{
							?>
									<option value="<?php echo strtolower( $country[ 'country' ] ); ?>"><?php echo isset( $translate_locations_ua_reverse[ strtolower( $country[ 'country' ] ) ] ) ? $translate_locations_ua_reverse[ strtolower( $country[ 'country' ] ) ] : ''; ?></option>
							<?php
									$countries_register_list[] = $country[ 'country' ];
								}
							}
							
							?>
						</select>
						<input name="receiver_location_city" placeholder="<?php echo $translate_locations_ua_reverse[ "city" ]; ?>" class="location-city float-left font-size-d8 border-radius-5px shadow-light bsizing-border-box"/>
					</div>
				</section>
			</div>
			
			<div class="calculate-data-page">
				<div class="calculate-params-container cparam-container-active">
					<h4 class="headline-params float-left">
					<?php echo $translate_locations_ua_reverse[ 'place' ]; ?><span class="cargo-number">1</span>
					</br>
					<?php echo $translate_locations_ua_reverse[ 'select_weight_params' ]; ?>
					</h4>
					<section class="calculate-section float-left">
						<div class="cparam-input-container float-left">
							<input type="text" name="weight[]" placeholder="<?php echo $translate_locations_ua_reverse[ 'weight_kg' ]; ?>" class="calculate-param-input bsizing-border-box font-size-d8 border-radius-5px shadow-light"/>
						</div>
						<div class="cparam-input-container float-left">
						<input type="text" name="capacity[]" placeholder="<?php echo $translate_locations_ua_reverse[ 'capacity_m' ]; ?>&#178;" class="calculate-param-input bsizing-border-box font-size-d8 border-radius-5px shadow-light"/>
						</div>
						<div class="cparam-input-container float-left">
							<input type="text" name="width[]" placeholder="<?php echo $translate_locations_ua_reverse[ 'width_m' ]; ?>" class="calculate-param-input bsizing-border-box font-size-d8 border-radius-5px shadow-light"/>
						</div>
						<div class="cparam-input-container float-left">
							<input type="text" name="length[]" placeholder="<?php echo $translate_locations_ua_reverse[ 'length_m' ]; ?>" class="calculate-param-input bsizing-border-box font-size-d8 border-radius-5px shadow-light"/>
						</div>
						<div class="cparam-input-container float-left">
							<input type="text" name="height[]" placeholder="<?php echo $translate_locations_ua_reverse[ 'height_m' ]; ?>" class="calculate-param-input bsizing-border-box font-size-d8 border-radius-5px shadow-light"/>
						</div>
					</section>
					<section class="calculate-section float-left">
						<div class="calculate-buttons float-left">
							<button class="calculate-button text-uppercase float-left additional-place-button"><?php echo $translate_locations_ua_reverse[ 'additional_place' ]; ?></button>
							<button class="calculate-button text-uppercase float-left calculate-params-button"><?php echo $translate_locations_ua_reverse[ 'calculate' ]; ?></button>
						</div>
					</section>
					<section class="calculate-section float-left">
						<span class="calculate-size-notify">* <?php echo $translate_locations_ua_reverse[ 'notify_weight' ]; ?></span>
					</section>
			   </div>
			</div>
			
			<div class="calculate-data-page calculate-order-window">
				<div class="delivery-types float-left"></div>
			</div>
		</div>
		<div class="calculate-navigation float-left">
			<nav class="calculate-navigation-button cnav-button-prev float-left"><?php echo $translate_locations_ua_reverse[ 'back' ]; ?></nav>
			<nav class="calculate-sitems">
				<ul class="calculate-slide-items">
					<li class="calculate-slide-item cslide-item-active"></li>
					<li class="calculate-slide-item"></li>
					<li class="calculate-slide-item"></li>
				</ul>
			</nav>
			<nav class="calculate-navigation-button cnav-button-next float-right"><?php echo $translate_locations_ua_reverse[ 'next' ]; ?></nav>
		</div>
	</div>
<?php

}
else
{

?>
	
	<div class="calculate-cost">
		<h1 class="calculate-cost-headline text-uppercase"><?php echo $translate_locations_ua_reverse[ 'cost_calculate' ]; ?></h1>
		<div class="calculate-options">
			<section class="calculate-options-section coptions-section-left float-left">
				<div class="coption-block float-left">
					<span class="coption-title float-left font-bold"><?php echo $translate_locations_ua_reverse[ 'select_country' ]; ?>:</span>
					<div class="coption-select-container coption-grey-border float-left bsizing-border-box">
						<span class="coption-select-title"><?php echo $translate_locations_ua_reverse[ 'select_action_country' ]; ?></span>
						<span class="coption-select-icon fa fa-caret-down float-right"></span>
						<select name="country" class="coption-select">
							<option><?php echo $translate_locations_ua_reverse[ 'select_action_country' ]; ?></option>
							
							<?php
							
							$countries_register_list = array();
							
							foreach( $countries_list[ $type ] as $country )
							{
								if( ! in_array( $country[ 'country' ], $countries_register_list ) )
								{
							?>
									<option value="<?php echo strtolower( $country[ 'country' ] ); ?>"><?php echo isset( $translate_locations_ua_reverse[ strtolower( $country[ 'country' ] ) ] ) ? $translate_locations_ua_reverse[ strtolower( $country[ 'country' ] ) ] : ''; ?></option>
							<?php
									$countries_register_list[] = $country[ 'country' ];
								}
							}
							
							?>
						</select>
					</div>
				</div>
				<div class="coption-block float-left">
					<span class="coption-title float-left font-bold"><?php echo $translate_locations_ua_reverse[ 'specify_weight' ]; ?>:</span>
					<div class="coption-input-wrapper float-left">
						<input type="text" name="weight" placeholder="<?php echo $translate_locations_ua_reverse[ 'kg' ]; ?>" class="coption-input coption-grey-border bsizing-border-box"/>
					</div>
				</div>
			</section>
			<section class="calculate-options-section coptions-section-right float-left">
				<div class="coption-block float-left">
					<span class="coption-title float-left font-bold"><?php echo $translate_locations_ua_reverse[ 'select_city' ]; ?>:</span>
					<div class="coption-select-container coption-grey-border float-left bsizing-border-box">
						<span class="coption-select-title"><?php echo $translate_locations_ua_reverse[ 'select_action_city' ]; ?></span>
						<span class="coption-select-icon fa fa-caret-down float-right"></span>
						<select name="city" class="coption-select">
							<option><?php echo $translate_locations_ua_reverse[ 'select_action_city' ]; ?></option>
							
							<?php
							
							foreach( $countries_list[ $type ] as $country )
							{
								if( isset( $translate_locations_ua_reverse[ strtolower( $country[ 'city' ] ) ] ) )
								{
							?>
							
								<option value="<?php echo strtolower( $country[ 'city' ] ); ?>"><?php echo $translate_locations_ua_reverse[ strtolower( $country[ 'city' ] ) ]; ?></option>
							
							<?php
								}
							}
							
							?>
						</select>
					</div>
				</div>
				<div class="coption-block float-left">
					<span class="coption-title float-left font-bold"><?php echo $translate_locations_ua_reverse[ 'select_cargo_weight' ]; ?>:</span>
					<div class="coption-input-container float-left">
						<input type="text" name="width" placeholder="<?php echo $translate_locations_ua_reverse[ 'width_m' ]; ?>" class="coption-input-full coption-grey-border float-left bsizing-border-box"/>
					</div>
					<div class="coption-input-container float-left">
						<input type="text" name="length" placeholder="<?php echo $translate_locations_ua_reverse[ 'length_m' ]; ?>" class="coption-input-full coption-grey-border float-left bsizing-border-box"/>
					</div>
					<div class="coption-input-container float-left">
						<input type="text" name="height" placeholder="<?php echo $translate_locations_ua_reverse[ 'height_m' ]; ?>" class="coption-input-full coption-grey-border float-left bsizing-border-box"/>
					</div>
				</div>
			</section>
		</div>
		<div class="calculate-result float-left"></div>
		<div class="calculate-action">
			<button class="calculate-button text-uppercase" id="calculate-params-button"><?php echo $translate_locations_ua_reverse[ 'calculate' ]; ?></button>
		</div>
	</div>
	
<?php

}

if( $type === 'our' )
{
	
?>

	<script type="text/template" id="calculator-order-template">
		<section class="calculate-data-item float-left bsizing-border-box" id="delivery-type-{{DELIVERY_TYPE}}">
			<h5 class="calculate-order-headline">{{DELIVERY_TYPE_TITLE}}</h5>
			<select name="{{SENDER_LOCATION_TYPE}}" class="order-location-select float-left font-size-d8 border-radius-5px shadow-light">
				{{SENDER_LOCATION_ITEMS}}
			</select>
			<select name="{{RECEIVER_LOCATION_TYPE}}" class="order-location-select float-left font-size-d8 border-radius-5px shadow-light">
				{{RECEIVER_LOCATION_ITEMS}}
			</select>
			<b class="calculate-order-price float-left">{{ORDER_PRICE}}*</b>
			<div class="calculate-mdata-container float-left">
				<div class="calculate-meta-data float-left">
					<span class="cmeta-data-headline font-size-d8">{{FACT_WEIGHT_TITLE}}</span>
					<b>{{ORDER_FACT_WEIGHT}} кг</b>
				</div>
				<div class="calculate-meta-data float-right">
					<span class="cmeta-data-headline font-size-d8">{{CAPACITY_WEIGHT_TITLE}}</span>
					<b>{{ORDER_CAPACITY_WEIGHT}} кг</b>
				</div>
			</div>
			<button class="calculate-button calculate-order-button text-uppercase">{{ORDER_SUBMIT_BUTTON_TITLE}}</button>
			<a href="/" data-id="delivery-type-{{DELIVERY_TYPE}}" class="ctype-detail-link type-detail-button text-uppercase font-size-d8 float-left">*{{DELIVERY_TYPE_DETAIL}}</a>
		</section>
	</script>

	<script type="text/template" id="location-item">
		<option value="{{LOCATION_SLUG}}" {{SELECTED}}>{{LOCATION_NAME}}</option>
	</script>

	<script type="text/template" id="delivery-type-template">
		<section class="delivery-type-description" id="delivery-type-{{DELIVERY_TYPE}}">
			<div class="delivery-description-head float-left">
				<h3 class="float-left delivery-description-headline">{{DELIVERY_TYPE_TITLE}}</h3>
				<span class="delivery-description-close float-right">X</span>
			</div>
			<div class="delivery-description-content float-left">
				{{DELIVERY_TYPE_DESCRIPTION}}
			</div>
			<div class="delivery-description-footer float-left">
				<div class="links-list float-left">
					{{DELIVERY_TYPES_ITEMS}}
				</div>
				<div class="price-notes float-left">
					<span class="calculate-size-notify">* <?php echo $translate_locations_ua_reverse[ 'prices_notify' ]; ?></span>
					<span class="calculate-size-notify"><?php echo $translate_locations_ua_reverse[ 'deliveries_notify' ]; ?></span>
				</div>
			</div>
		</section>
	</script>

	<script type="text/template" id="delivery-titem-template">
		<a href="/" data-id="delivery-type-{{DELIVERY_TYPE}}" class="link-red type-detail-button">{{DELIVERY_TYPE_TITLE}}</a>
	</script>
	
	<script type="text/javascript">
	$( window ).ready( function()
	{
		// Validator object

		function Calculator( pages, navigation, prevButton, nextButton )
		{
			var OCalculator = this;
			
			OCalculator.pageNumber = 0;
			
			OCalculator.prevPage = function()
			{
				OCalculator.pageNumber--;
				
				if( OCalculator.pageNumber < 0 )
				{
					OCalculator.pageNumber = 0;
				}
				
				OCalculator.goToPage();
				OCalculator.updateNavigationItem();
			};
			
			OCalculator.nextPage = function()
			{
				OCalculator.pageNumber++;
				
				if( OCalculator.pageNumber >= pages.length  )
				{
					OCalculator.pageNumber = pages.length - 1;
				}
				
				OCalculator.goToPage();
				OCalculator.updateNavigationItem();
			};
			
			OCalculator.goToPage = function()
			{
				// set active page

				pages.parent().find( '.cdata-page-active' ).removeClass( 'cdata-page-active' );
				pages.eq( OCalculator.pageNumber ).addClass( 'cdata-page-active' );
			};
			
			// set active navigation item
			
			OCalculator.updateNavigationItem = function()
			{
				$( '.cslide-item-active' ).removeClass( 'cslide-item-active' );
			
				navigation.find( '.calculate-slide-item' ).eq( OCalculator.pageNumber ).addClass( 'cslide-item-active' );
			};
			
			navigation.on( 'click', function( e )
			{
				e = e || window.event;
				
				var target = $( e.target );
				
				if( target.hasClass( 'calculate-slide-item' ) )
				{
					OCalculator.pageNumber = target.index();
					OCalculator.goToPage();
					OCalculator.updateNavigationItem();
				}
			} );
			
			prevButton.on( 'click', function()
			{
				OCalculator.prevPage();
			} );
			
			nextButton.on( 'click', function()
			{
				OCalculator.nextPage();
			} );
			
			// set handlers
			
			var additionalPlaceButton = $( '.additional-place-button' );
			
			additionalPlaceButton.on( 'click', function()
			{
				var calculateParamsContainerActive = $( '.cparam-container-active' );
				var cloneParamsContainer = calculateParamsContainerActive.clone( true );
				let cargoNumber = cloneParamsContainer.find( '.cargo-number' );
				let cargoNumberValue = cargoNumber.text();
				cargoNumberValue++;
				
				cargoNumber.text( cargoNumberValue );
				
				calculateParamsContainerActive.parent().append( cloneParamsContainer );
				calculateParamsContainerActive.removeClass( 'cparam-container-active' );
			} );
			
			var calculateParamsButton = $( '.calculate-params-button' );
			
			var oValidator = new Validator( [
				{
					name: 'weight[]',
					params: {
						isEmpty: true,
						anotherField: 'capacity[]'
					}
				},
				
				{
					name: 'capacity[]',
					params: {
						isNumber: true
					}
				},
				
				{
					name: 'width[]',
					params: {
						isEmpty: true,
						isNumber: true,
						anotherField: 'capacity[]'
					}
				},
				
				{
					name: 'length[]',
					params: {
						isEmpty: true,
						isNumber: true,
						anotherField: 'capacity[]'
					}
				},
				
				{
					name: 'height[]',
					params: {
						isEmpty: true,
						isNumber: true,
						anotherField: 'capacity[]'
					}
				}
			] );
			
			// calculate params
			
			calculateParamsButton.on( 'click', function()
			{
				var cparamContainerActive = $( '.cparam-container-active' );
				
				oValidator.checkErrors( cparamContainerActive, [
					{
						name: 'validate-error',
						removeClass: true
					},
					
					{
						name: 'validate-error-content',
						remove: true
					}
				] );
				
				oValidator.validateFields( function()
				{
					var checkErrors = oValidator.checkErrors( cparamContainerActive, [ 
						{
							name: 'validate-error'
						},

						{
							name: 'validate-error-content'
						}
					] );
					
					if( ! checkErrors )
					{
						let cparamContainerActive = $( '.cparam-container-active' );
						let validatorErrorNotifies = cparamContainerActive.find( '.validator-error-notifies' );
						
						if( validatorErrorNotifies[0] !== undefined )
						{
							validatorErrorNotifies.remove();
						}
					
						var senderLocationCountry = $( 'select[name="sender_location_country"]' );
						var senderLocationCity = $( 'input[name="sender_location_city"]' );
						var receiverLocationCountry = $( 'select[name="receiver_location_country"]' );
						var receiverLocationCity = $( 'input[name="receiver_location_city"]' );
						var translateLocation = JSON.parse( '<?php echo $translate_locations; ?>' );
						
						var validateMessages = '';
						
						if( senderLocationCountry[0].selectedIndex <= 0 )
						{
							validateMessages += 
							`
							<div class="validate-error-notify border-radius-5px">
								<?php echo $translate_locations_ua_reverse[ 'validaton_select_sender_country' ]; ?>
							</div>
					
							`;
						}
						
						if( senderLocationCity.val() === '' )
						{
							validateMessages += 
							`
							<div class="validate-error-notify border-radius-5px">
								<?php echo $translate_locations_ua_reverse[ 'validaton_specify_sender_city' ]; ?>
							</div>
					
							`;
						}
						
						if( receiverLocationCountry[0].selectedIndex <= 0 )
						{
							validateMessages += 
							`
							<div class="validate-error-notify border-radius-5px">
								<?php echo $translate_locations_ua_reverse[ 'validaton_select_sender_country' ]; ?>
							</div>
					
							`;
						}
						
						if( receiverLocationCity.val() === '' )
						{
							validateMessages += 
							`
							<div class="validate-error-notify border-radius-5px">
								<?php echo $translate_locations_ua_reverse[ 'validaton_specify_receiver_city' ]; ?>
							</div>
					
							`;
						}
						
						if( receiverLocationCountry.find( 'option' ).eq( receiverLocationCountry[ 0 ].selectedIndex ).val() !== 'ukraine'
						  && receiverLocationCountry.find( 'option' ).eq( senderLocationCountry[ 0 ].selectedIndex ).val() !== 'ukraine' )
						{
							validateMessages += 
							`
							<div class="validate-error-notify border-radius-5px">
								<?php echo $translate_locations_ua_reverse[ 'validaton_one_country_required' ]; ?>
							</div>
					
							`;
						}
						
						if( validateMessages !== ''  )
						{
							validateMessages = '<section class="calculate-section float-left validator-error-notifies">' + validateMessages + '</section>';
							
							cparamContainerActive.append( validateMessages );
						}
						else
						{
							var deliveryTypes = JSON.parse( '<?php echo json_encode( $delivery_types ); ?>' );
							var deliverySubType = $( 'select[name="delivery_type"]' );
							deliverySubType = deliverySubType.find( 'option' ).eq( deliverySubType[0].selectedIndex ).val();
							var countries_list = JSON.parse( '<?php echo addslashes( json_encode( $countries_list ) ); ?>' );
							
							senderLocationCountry = senderLocationCountry.val();
							receiverLocationCountry = receiverLocationCountry.val();
							senderLocationCity = translateLocation[ senderLocationCity.val() ];
							receiverLocationCity = translateLocation[ receiverLocationCity.val() ];
							
							// input params
							
							var capacity = $( 'input[name="capacity[]"]' );
							var fact_weight = $( 'input[name="weight[]"]' );
							var width = $( 'input[name="width[]"]' );
							var length = $( 'input[name="length[]"]' );
							var height = $( 'input[name="height[]"]' );
							
							var weight = 0;
								
							if( capacity.eq( 0 ).val() !== '' )
							{
								capacity.each( function( c )
								{
									weight += formatFloat( capacity.eq( c ).val() ) * 1;
								} );
							}
							else
							{
								var calculate_fact_weight = 0;
								
								fact_weight.each( function( fw )
								{
									calculate_fact_weight += formatFloat( fact_weight.eq( fw ).val() ) * 1;
								} );
								
								var fieldWidth = 0;
								
								width.each( function( w )
								{
									fieldWidth += formatFloat( width.eq( w ).val() ) * 1;
								} );
								
								var fieldLength = 0;
								
								length.each( function( w )
								{
									fieldLength += formatFloat( length.eq( w ).val() ) * 1;
								} );
								
								var fieldHeight = 0;
								
								height.each( function( w )
								{
									fieldHeight += formatFloat( height.eq( w ).val() ) * 1;
								} );
							}
							
							function getLocationOption( deliveryCurrentType, locationType, selectedValue )
							{
								var registerLocations = [];
								var locationItemsHtml = '';
								var locationItem = $( '#location-item' );
								
								for( let c in countries_list[ deliveryCurrentType.delivery_type ] )
								{
									let currentLocation = countries_list[ deliveryCurrentType.delivery_type ][ c ];

									if( registerLocations.indexOf( currentLocation[ locationType ].toLowerCase() ) !== -1 )
									{
										continue;
									}

									let templateLocationParams = 
									{
										LOCATION_SLUG: currentLocation[ locationType ].toLowerCase(),
										LOCATION_NAME: translateLocationsReverseUA[ currentLocation[ locationType ].toLowerCase() ],
										SELECTED: currentLocation[ locationType ].toLowerCase() === selectedValue.toLowerCase() ? 'selected' : '',
										SENDER_LOCATION_TYPE: deliveryCurrentType.delivery_type
									};

									locationItemsHtml += templateCompilator.compile( locationItem.html(), templateLocationParams );

									registerLocations.push( currentLocation[ locationType ].toLowerCase() );
								}
									
								return locationItemsHtml;
							}
							
							var deliveryTypesHtml = '';
							var deliveryTypesDescription = '';
							var translateLocationsReverseUA = JSON.parse( '<?php echo json_encode( $translate_locations_ua_reverse ); ?>' );
							var calculatorOrderTemplate = $( '#calculator-order-template' );
							var deliveryTypeTemplate = $( '#delivery-type-template' );
							var deliveryTypeItemTemplate = $( '#delivery-titem-template' );
							
							for( let i in deliveryTypes )
							{
								let deliveryCurrentType = deliveryTypes[ i ];
								
								if( weight === 0 )
								{
									if( deliverySubType === 'documents' && deliveryCurrentType.ethalon_value.documents !== undefined )
									{
										result_weight = Calculate.getCapacity( fieldWidth, fieldLength, fieldHeight, deliveryCurrentType.ethalon_value.documents );
									}
									else
									{
										result_weight = Calculate.getCapacity( fieldWidth, fieldLength, fieldHeight, deliveryCurrentType.ethalon_value.parcels );
									}
								}
								else
								{
									if( deliverySubType === 'documents' && deliveryCurrentType.ethalon_value.documents !== undefined )
									{
										result_weight = Calculate.getEthalon( weight, deliveryCurrentType.ethalon_value.documents );
									}
									else
									{
										result_weight = Calculate.getEthalon( weight, deliveryCurrentType.ethalon_value.parcels );
									}
								}
								
								if( typeof calculate_fact_weight !== 'undefined' && calculate_fact_weight > result_weight )
								{
									result_weight = calculate_fact_weight;
								}
								
								var registerLocations = [];
								var senderLocationItems;
								var receiverLocationItems;
								
								if( deliveryCurrentType.delivery_type !== 'cargo' && deliveryCurrentType.delivery_type !== 'standart' )
								{
									senderLocationItems = getLocationOption( deliveryCurrentType, 'country', senderLocationCountry );
									receiverLocationItems = getLocationOption( deliveryCurrentType, 'country', receiverLocationCountry );
								}
								else
								{
									senderLocationItems = getLocationOption( deliveryCurrentType, 'city', senderLocationCity );
									receiverLocationItems = getLocationOption( deliveryCurrentType, 'city', receiverLocationCity );
								}
								
								let countries_list_params =
								{
									paramCountry: receiverLocationCountry,
									paramCity: receiverLocationCity,
									calculatedWeight: result_weight,
									fuelIncrease: deliveryCurrentType.fuel_increase / 100,
									minPriceMaxSegment: deliveryCurrentType.min_price_max_segment
								};
								
								var price = Calculate.getPriceByWeight( countries_list[ deliveryCurrentType.delivery_type ], countries_list_params )
								var templateOrderParams;
								var priceResult;
								
								if( typeof price === 'number' )
								{
									if( deliveryCurrentType.delivery_type === 'cargo' || deliveryCurrentType.delivery_type === 'standart' )
									{    
										if( receiverLocationCountry === 'ukraine' )
										{
											priceResult = 'Вартість уточнюйте у менеджера';
										}
										else
										{
											if( result_weight <= 300 )
											{
												if( deliverySubType !== 'documents' )
												{
													if( ! isNaN( price ) )
													{
														priceResult = price + ' грн.';
													}
													else
													{
														priceResult = '<?php echo $translate_locations_ua_reverse[ 'undefined_country' ]; ?>';
													}
												}
												else
												{
													priceResult = '<?php echo $translate_locations_ua_reverse[ 'message_express_cargo' ]; ?>';
												}
											}
											else
											{
												priceResult = '<?php echo $translate_locations_ua_reverse[ 'message_itemaze_admin' ]; ?>';
											}
										}
									}
									else
									{
										if( ! isNaN( price ) )
										{
											priceResult = price + ' грн.';
										}
										else
										{
											priceResult = '<?php echo $translate_locations_ua_reverse[ 'undefined_country' ]; ?>';
										}
									}
								}
								else if( price === undefined )
								{
									priceResult = '<?php echo $translate_locations_ua_reverse[ 'undefined_country' ]; ?>';
								}
								else if( price.status === 'undetermined' )
								{
									priceResult = '<?php echo $translate_locations_ua_reverse[ 'message_itemaze_admin' ]; ?>';
								}
								else
								{
									priceResult = '<?php echo $translate_locations_ua_reverse[ 'message_min_price' ]; ?>: ' + price.value + ' грн.';
								}
								
								templateOrderParams =
								{
									DELIVERY_TYPE_TITLE: translateLocationsReverseUA[ deliveryCurrentType.delivery_type ],
									SENDER_LOCATION_ITEMS: senderLocationItems,
									RECEIVER_LOCATION_ITEMS: receiverLocationItems,
									ORDER_PRICE: priceResult, 
									ORDER_FACT_WEIGHT: ( typeof calculate_fact_weight !== 'undefined' ? calculate_fact_weight : result_weight ),
									ORDER_CAPACITY_WEIGHT: result_weight,
									FACT_WEIGHT_TITLE: translateLocationsReverseUA[ 'fact_weight_title' ],
									CAPACITY_WEIGHT_TITLE: translateLocationsReverseUA[ 'capacity_weight_title' ],
									ORDER_SUBMIT_BUTTON_TITLE: price !== undefined && price.status === 'undetermined' || price === undefined ? 'Швидкий звязок' : translateLocationsReverseUA[ 'order_submit_button' ],
									DELIVERY_TYPE_DETAIL: translateLocationsReverseUA[ 'delivery_type_detail' ],
									DELIVERY_TYPE: deliveryCurrentType.delivery_type
								};
									
								deliveryTypesHtml += templateCompilator.compile( calculatorOrderTemplate.html(), templateOrderParams );
								
								// set description
								
								deliveryTypesItems = '';
					
								for( let d in deliveryTypes )
								{
									let currentType = deliveryTypes[ d ];
									
									if( deliveryCurrentType.delivery_type !== currentType.delivery_type )
									{
										let deliveryTypesItemsParams =
										{
											DELIVERY_TYPE: currentType.delivery_type,
											DELIVERY_TYPE_TITLE: translateLocationsReverseUA[ currentType.delivery_type ]
										}

										deliveryTypesItems += templateCompilator.compile( deliveryTypeItemTemplate.html(), deliveryTypesItemsParams );
										
										if( d !== deliveryTypes.length - 1 )
										{
											deliveryTypesItems += '</br>';
										}
									}
								}
					
								deliveryTypesParams =
								{
									DELIVERY_TYPE_TITLE: translateLocationsReverseUA[ deliveryCurrentType.delivery_type ],
									DELIVERY_TYPE_DESCRIPTION: deliveryCurrentType.type_description,
									DELIVERY_TYPES_ITEMS: deliveryTypesItems,
									DELIVERY_TYPE: deliveryCurrentType.delivery_type
								};
					
								deliveryTypesDescription += templateCompilator.compile( deliveryTypeTemplate.html(), deliveryTypesParams ); 
							}
							
							var calculateOrderWindow = $( '.calculate-order-window' );
							
							calculateOrderWindow.append( deliveryTypesHtml );
							
							var deliveryTypesContainer = $( '.delivery-types' );
							
							deliveryTypesContainer.append( deliveryTypesDescription );
							
							OCalculator.nextPage();
							
							var calculateDataItem = $( '.calculate-data-item' );
							var deliveryTypesDescription = $( '.delivery-type-description' );

							calculateOrderWindow.on( 'click', function( e )
							{
								e = e || window.event;
								e.preventDefault();

								var target = $( e.target );

								if( target.hasClass( 'type-detail-button' ) )
								{
									calculateDataItem.hide();
									deliveryTypesDescription.hide();

									let deliveryTypeDescription = $( '#' + target.attr( 'data-id' ) );

									deliveryTypeDescription.show();
								}
								else if( target.hasClass( 'delivery-description-close' ) )
								{
									deliveryTypesDescription.hide();
									calculateDataItem.show();
								}
							} );
						}
					}
				} );
			} );
		}
		
		new Calculator( $( '.calculate-data-page' ), $( '.calculate-slide-items' ), $( '.cnav-button-prev' ), $( '.cnav-button-next' ) );
	} );
</script>
<?php 
	
}
else
{

?>
	<script type="text/javascript">
	$( window ).ready( function()
	{
		var oValidator = new Validator( [
			{
				name: 'weight',
				params: 
				{
					isEmpty: true,
					isNumber: true
				}
			},
			
			{
				name: 'width',
				params: 
				{
					isEmpty: true,
					isNumber: true,
					notifyMessageIndent: '3rem'
				}
			},
			
			{
				name: 'length',
				params: 
				{
					isEmpty: true,
					isNumber: true,
					notifyMessageIndent: '3rem'
				}
			},
			
			{
				name: 'height',
				params: 
				{
					isEmpty: true,
					isNumber: true,
					notifyMessageIndent: '3rem'
				}
			},
			
			{
				name: 'country',
				params: 
				{
					isSelect: true,
					additionalField: $( 'select[name="country"]' ).parent()[0],
					notifyMessageIndent: '3rem'
				}
			},
			
			{
				name: 'city',
				params: 
				{
					isSelect: true,
					additionalField: $( 'select[name="city"]' ).parent()[0],
					notifyMessageIndent: '3rem'
				}
			}
		] );
		
		let calculateParamsButton = $( '#calculate-params-button' );
		
		calculateParamsButton.on( 'click', function()
		{
			var calculateOptions = $( '.calculate-options' );
			
			oValidator.checkErrors( calculateOptions, [
				{
					name: 'validate-error',
					removeClass: true
				},
				
				{
					name: 'validate-error-content',
					remove: true
				}
			] );
			
			oValidator.validateFields( function()
			{
				var checkErrors = oValidator.checkErrors( calculateOptions, [ 
					{
						name: 'validate-error'
					},

					{
						name: 'validate-error-content'
					}
				] );
				
				if( ! checkErrors )
				{
					var calculateWidthInput = $( 'input[name="weight"]' );
					var calculatedWeight = formatFloat( calculateWidthInput.val() );
					var paramCountry = $( 'select[name="country"]' );
					paramCountry = paramCountry.find( 'option' ).eq( paramCountry[ 0 ].selectedIndex );
					var paramCity = $( 'select[name="city"]' );
					paramCity = paramCity.find( 'option' ).eq( paramCity[ 0 ].selectedIndex );
					
					let paramWidth = $( 'input[name="width"]' );
					let paramLength = $( 'input[name="length"]' );
					let paramHeight = $( 'input[name="height"]' );
					
					var calculatedCapacity = Calculate.getCapacity( formatFloat( paramWidth.val() ), formatFloat( paramLength.val() ), formatFloat( paramHeight.val() ), '<?php echo $calculate_data[ "ethalon_value" ][ "parcels" ]; ?>' );
					
					if( calculatedWeight < calculatedCapacity )
					{
						calculatedWeight = calculatedCapacity;
					}
					
					var calculatePriceParams =
					{
						calculatedWeight: calculatedWeight,
						calculateResult: $( '.calculate-result' ),
						fuelIncrease: '<?php echo $calculate_data[ "fuel_increase" ] / 100; ?>',
						paramCountry: paramCountry.val(),
						paramCity: paramCity.val(),
						minPriceMaxSegment: '<?php echo $calculate_data[ "delivery_max_min_price" ]; ?>',
						calculatedCapacity: calculatedCapacity
					}
					
					let calculateData = JSON.parse( '<?php echo addslashes( json_encode( $countries_list[ $type ] ) ); ?>' );
					
					var priceCalculateResult = Calculate.getPriceByWeight( calculateData, calculatePriceParams );
					
					if( typeof priceCalculateResult === 'object' && priceCalculateResult.status === 'undetermined' )
					{
						let message = '<?php echo $translate_locations_ua_reverse[ "message_itemaze_admin" ]; ?>';
						
						calculatePriceParams.calculateResult.html( message );
					}
					else if( typeof priceCalculateResult === 'object' && priceCalculateResult.status === 'under' )
					{
						let message = '<?php echo $translate_locations_ua_reverse[ "message_min_price" ]; ?> ' + ( priceCalculateResult.value + ( priceCalculateResult.value * calculatePriceParams.fuelIncrease ) );
						
						calculatePriceParams.calculateResult.html( message );
					}
					else
					{
						let message = '<span class="float-left"><?php echo $translate_locations_ua_reverse[ "delivery_price" ]; ?>: ' + priceCalculateResult + ' грн.</span>';
						message += '<span class="float-right"><?php echo $translate_locations_ua_reverse[ "capacity" ]; ?>: ' + calculatePriceParams.calculatedCapacity + ' <?php echo $translate_locations_ua_reverse[ "kg" ]; ?>.</span>';

						calculatePriceParams.calculateResult.html( message );
					}
				}
			} );
		} );
		
		let coptionSelect = $( '.coption-select' );
		
		coptionSelect.on( 'change', function( e )
		{
			let thisSelectButton = $( this );

			let currentOption = thisSelectButton.find( 'option' ).eq( thisSelectButton[0].selectedIndex );
			thisSelectButton.parent().find( '.coption-select-title' ).text( currentOption.text() );
		} );
	} );
</script>
	
<?php

}

?>