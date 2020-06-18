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
			<div>
                <?php/*<section class="calculate-options-section calculate-section-30 float-left">
					<div class="coption-block float-left">
						<div class="coption-select-container coption-grey-border coption-shadow border-radius-10px float-left bsizing-border-box">
								
							<?php
						
							global $params;
					
							$params = array(
								'data_title' => $translate_locations_ua_reverse[ 'select_action_subtype' ],
								'data_type' => 'subtypes',
								'data_list' => $delivery_sub_types
							);
							
							include( __DIR__ . '/subtypes-list.php' );
							
							?>
						</div>
					</div>
				</section>*/?>
                <section class="calculate-options-section calculate-section-30 float-left">
					<div class="coption-block float-left">
						<div class="coption-select-container coption-grey-border coption-shadow border-radius-10px float-left bsizing-border-box">
						
							<?php
							
							global $params;
					
							$params = array(
								'data_title' => $translate_locations_ua_reverse[ 'select_action_country' ],
								'data_type' => 'country',
								'data_list' => $countries_list[ $type ],
								'search_title' => 'Пошук країни'
							);
							
							include( __DIR__ . '/locations-list.php' );
							
							?>
									
						</div>
					</div>
				</section>
				<section class="calculate-options-section calculate-section-30 float-right">
					<div class="coption-block float-left">
						<div class="coption-select-container coption-grey-border coption-shadow border-radius-10px float-left bsizing-border-box">
						
							<?php 
							
							$params = array(
								'data_title' => $translate_locations_ua_reverse[ 'select_action_city' ],
								'data_type' => 'city',
								'data_list' => $citiesList[ strtolower( $countries_list[ $type ][ 0 ][ 'country' ] ) ],
								'search_title' => 'Пошук міста'
							);
							
							include( __DIR__ . '/locations-list.php' );

							?>
							
						</div>
					</div>
				</section>
			</div>
			<div>
				<section class="calculate-options-section coptions-section-left float-left">
					<div class="coption-block float-left">
						<div class="coption-input-wrapper float-left">
							<input type="text" name="weight" placeholder="<?php echo $translate_locations_ua_reverse[ 'set_kg' ]; ?>" class="coption-input coption-grey-border coption-shadow border-radius-10px coption-shadow bsizing-border-box"/>
						</div>
					</div>
				</section>
				<section class="calculate-options-section coptions-section-right float-right">
					<div class="coption-block float-left">
						<div class="coption-input-container float-left">
							<input type="text" name="width" placeholder="<?php echo $translate_locations_ua_reverse[ 'width_m' ]; ?>" class="coption-input-full coption-grey-border coption-shadow border-radius-10px float-left bsizing-border-box"/>
						</div>
						<div class="coption-input-container float-left">
							<input type="text" name="length" placeholder="<?php echo $translate_locations_ua_reverse[ 'length_m' ]; ?>" class="coption-input-full coption-grey-border coption-shadow border-radius-10px float-left bsizing-border-box"/>
						</div>
						<div class="coption-input-container float-left">
							<input type="text" name="height" placeholder="<?php echo $translate_locations_ua_reverse[ 'height_m' ]; ?>" class="coption-input-full coption-grey-border coption-shadow border-radius-10px float-left bsizing-border-box"/>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="calculate-result float-left"></div>
		<div class="calculate-action">
			<button class="calculate-button text-uppercase" id="calculate-params-button"><?php echo $translate_locations_ua_reverse[ 'calculate' ]; ?></button>
		</div>
		
		<script type="text/javascript" src="<?php echo plugins_url( 'mps-calculator/sources/js/get-top-parent.js' ); ?>"></script>
	</div>
	
<?php

}

?>
	
<?php

if( $type === 'our' )
{
	
?>
	<script type="text/template" id="location-item">
		<option value="{{LOCATION_SLUG}}" class="locations-select-item {{SELECTED}}">{{LOCATION_NAME}}</option>
	</script>

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
				
				OCalculator.goToPage( true );
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
			
			OCalculator.goToPage = function( clearData = false )
			{
				// set active page

				let activePage = pages.parent().find( '.cdata-page-active' );

				if( clearData )
				{
					if( activePage.index() === 2 )
					{
						let calculateParamInput = $( '.calculate-param-input' );
						calculateParamInput.val( '' );
					}
					else if( activePage.index() === 1 )
					{
						$( '.calculate-cargo-type' )[ 0 ].selectedIndex = 0;
						$( '.location-country' )[ 0 ].selectedIndex = 0;
						$( '.location-city' ).val( '' );
						$( '.calculate-param-input' ).val( '' );;
					}
				}

				activePage.removeClass( 'cdata-page-active' );
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
					OCalculator.goToPage( true );
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
						anotherField: 'capacity[]',
						limitIntegerLength: 2
					}
				},
				
				{
					name: 'capacity[]',
					params: {
						isNumber: true,
						limitIntegerLength: 2
					}
				},
				
				{
					name: 'width[]',
					params: {
						isNumber: true,
						limitIntegerLength: 2
					}
				},
				
				{
					name: 'length[]',
					params: {
						isNumber: true,
						limitIntegerLength: 2
					}
				},
				
				{
					name: 'height[]',
					params: {
						isNumber: true,
						limitIntegerLength: 2
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
					
                        var deliverySubType = $( 'select[name="delivery_type"]' );
				        deliverySubType = deliverySubType.find( 'option' ).eq( deliverySubType[0].selectedIndex ).val();
						var senderLocationCountry = $( 'select[name="sender_location_country"]' );
						var senderLocationCity = $( 'input[name="sender_location_city"]' );
						var receiverLocationCountry = $( 'select[name="receiver_location_country"]' );
						var receiverLocationCity = $( 'input[name="receiver_location_city"]' );
						var translateLocation = JSON.parse( '<?php echo addslashes( $translate_locations ); ?>' );
						
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
						
						if( senderLocationCity.val() === '' && deliverySubType !== 'documents' )
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
						
						if( receiverLocationCity.val() === '' && deliverySubType !== 'documents' )
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
							var countries_list = JSON.parse( '<?php echo addslashes( json_encode( $countries_list ) ); ?>' );
                            var minPricesList = JSON.parse( '<?php echo json_encode( $min_prices_list ); ?>' );

							senderLocationCountry = senderLocationCountry.find( 'option' ).eq( senderLocationCountry[ 0 ].selectedIndex ).val();
							receiverLocationCountry = receiverLocationCountry.find( 'option' ).eq( receiverLocationCountry[ 0 ].selectedIndex  ).val();
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
                                    
									if( translateLocationsReverseUA[ currentLocation[ locationType ].toLowerCase() ] !== undefined )
									{
                                        if( locationType === 'city' )
                                        { 
                                            var templateLocationParams = 
                                            {
                                                LOCATION_SLUG: currentLocation[ locationType ].toLowerCase(),
                                                LOCATION_NAME: translateLocationsReverseUA[ currentLocation[ locationType ].toLowerCase() ],
                                                SENDER_LOCATION_TYPE: deliveryCurrentType.delivery_type
                                            };
                                            
                                            if( selectedValue !== undefined && minPricesList[ deliveryCurrentType.delivery_type ][ selectedValue ] !== undefined )
                                            { 
                                                let minPrice = Math.min.apply( null, minPricesList[ deliveryCurrentType.delivery_type ][ selectedValue ] );
                                                
                                                templateLocationParams[ 'SELECTED' ] = currentLocation[ 'country' ].toLowerCase() === selectedValue && currentLocation[ 'params' ][ 'min_price' ] === minPrice ? 'selected' : '';
                                            }
                                        }
                                        else
                                        {
                                            var templateLocationParams = 
                                            {
                                                LOCATION_SLUG: currentLocation[ locationType ].toLowerCase(),
                                                LOCATION_NAME: translateLocationsReverseUA[ currentLocation[ locationType ].toLowerCase() ],
                                                SELECTED: currentLocation[ locationType ].toLowerCase() === selectedValue ? 'selected' : '',
                                                SENDER_LOCATION_TYPE: deliveryCurrentType.delivery_type
                                            };
                                        }

										locationItemsHtml += templateCompilator.compile( locationItem.html(), templateLocationParams );
									}

									registerLocations.push( currentLocation[ locationType ].toLowerCase() );
								}
									
								return locationItemsHtml;
							}
							
							var deliveryTypesHtml = '';
							var deliveryTypesDescription = '';
							var translateLocationsReverseUA = JSON.parse( '<?php echo addslashes( json_encode( $translate_locations_ua_reverse ) ); ?>' );
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
									senderLocationItems = getLocationOption( deliveryCurrentType, 'city', senderLocationCountry );
									receiverLocationItems = getLocationOption( deliveryCurrentType, 'city', receiverLocationCountry );
								}
								
								let countries_list_params =
								{
									paramCountry: receiverLocationCountry,
									paramCity: receiverLocationCity,
									calculatedWeight: result_weight,
									fuelIncrease: deliveryCurrentType.fuel_increase / 100,
									minPriceMaxSegment: deliveryCurrentType.min_price_max_segment,
									onlyCountry: true
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
							
							calculateOrderWindow.html( deliveryTypesHtml );
                            
                            let selectedItems = $( '.selected' );
                            
                            selectedItems.each( function( sn )
                            {
                                selectedItems.eq( sn ).parent()[ 0 ].selectedIndex = selectedItems.eq( sn ).index();
                            } );
							
							var deliveryTypesContainer = '<div class="delivery-types float-left">';
							deliveryTypesContainer += deliveryTypesDescription;
							deliveryTypesContainer += '</div>';
							
							calculateOrderWindow.prepend( deliveryTypesContainer );
							
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
	<script type="text/template" id="location-item">
		<li data-value="{{LOCATION_SLUG}}" class="locations-select-item{{SELECTED}}">{{LOCATION_NAME}}</li>
	</script>

	<script type="text/javascript">
	$( window ).ready( function()
	{
		var calculateData = JSON.parse( '<?php echo addslashes( json_encode( $countries_list[ $type ] ) ); ?>' );
		var typesSignature = JSON.parse( '<?php echo addslashes( json_encode( $types_signature ) ); ?>' );
		var citiesList = JSON.parse( '<?php echo addslashes( json_encode( $citiesList ) ); ?>' );
		var translateLocationsReverseUA = JSON.parse( '<?php echo addslashes( json_encode( $translate_locations_ua_reverse ) ); ?>' );
		
		$( 'input[name="weight"]' ).focus();
		
		var oValidator = new Validator( [
			{
				name: 'weight',
				params: 
				{
					dependence: 
					{
						condition: 'isEmpty',
						elementsList: [ 
							$( 'input[name="width"]' ),
							$( 'input[name="length"]' ),
							$( 'input[name="height"]' )
						]
					},
					isEmpty: true,
					isNumber: true,
					limitIntegerLength: 2
				}
			},
			
			{
				name: 'width',
				params: 
				{
					isEmpty: true,
					isNumber: true,
					notifyMessageIndent: '3rem',
					limitIntegerLength: 2
				}
			},
			
			{
				name: 'length',
				params: 
				{
					isEmpty: true,
					isNumber: true,
					notifyMessageIndent: '3rem',
					limitIntegerLength: 2
				}
			},
			
			{
				name: 'height',
				params: 
				{
					isEmpty: true,
					isNumber: true,
					notifyMessageIndent: '3rem',
					limitIntegerLength: 2
				}
			},
			
			{
				name: 'country',
				params: 
				{
					isSelect: true,
					additionalField: $( 'div[name="country"]' ).parent()[ 0 ],
					width: getTopParent( $( 'div[name="country"' ), 'coption-select-container' )[ 0 ].offsetWidth,
					fromStartPosition: true
				}
			},
			
			{
				name: 'city',
				params: 
				{
					isSelect: true,
					additionalField: $( 'div[name="city"]' ).parent()[ 0 ],
					width: getTopParent( $( 'div[name="city"' ), 'coption-select-container' )[ 0 ].offsetWidth,
					fromStartPosition: true
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
					var calculateWeightInput = $( 'input[name="weight"]' );
					var calculatedWeight = formatFloat( calculateWeightInput.val() );
					var paramCountry = $( 'div[name="country"]' );
					paramCountry = paramCountry.find( 'li' ).eq( paramCountry[ 0 ].selectedIndex );
					var paramCity = $( 'div[name="city"]' );
					paramCity = paramCity.find( 'li' ).eq( paramCity[ 0 ].selectedIndex );
					
					let paramWidth = $( 'input[name="width"]' );
					let paramLength = $( 'input[name="length"]' );
					let paramHeight = $( 'input[name="height"]' );
					
					var deliveryCurrentType = typesSignature[ 2 ];
					let deliverySubType = $( '.locations-select' )[ 0 ].selectedIndex;
					deliverySubType = deliverySubType !== undefined ? $( '.locations-select' ).find( '.locations-select-item' ).eq( deliverySubType ).attr( 'data-value' ) : deliverySubType;
					
					if( deliverySubType !== undefined && deliverySubType === 'documents' && deliveryCurrentType.ethalon_value.documents !== undefined )
					{
						var calculatedCapacity = Calculate.getCapacity( formatFloat( paramWidth.val() ), formatFloat( paramLength.val() ), formatFloat( paramHeight.val() ), deliveryCurrentType.ethalon_value.documents );
					}
					else
					{
						var calculatedCapacity = Calculate.getCapacity( formatFloat( paramWidth.val() ), formatFloat( paramLength.val() ), formatFloat( paramHeight.val() ), deliveryCurrentType.ethalon_value.parcels );
					}
					
					if( calculatedWeight < calculatedCapacity )
					{
						calculatedWeight = calculatedCapacity;
					}
					
					var calculatePriceParams =
					{
						calculatedWeight: calculatedWeight,
						calculateResult: $( '.calculate-result' ),
						fuelIncrease: '<?php echo $calculate_data[ "fuel_increase" ] / 100; ?>',
						paramCountry: paramCountry.attr( 'data-value' ),
						paramCity: paramCity.attr( 'data-value' ),
						minPriceMaxSegment: '<?php echo $calculate_data[ "delivery_max_min_price" ]; ?>',
						calculatedCapacity: calculatedCapacity
					}
					
					var priceCalculateResult = Calculate.getPriceByWeight( calculateData, calculatePriceParams );
					
					if( typeof priceCalculateResult === 'object' && priceCalculateResult.status === 'undetermined' )
					{
						let message = '<?php echo $translate_locations_ua_reverse[ "message_itemaze_admin" ]; ?>';
						
						calculatePriceParams.calculateResult.html( message );
					}
					else if( typeof priceCalculateResult === 'object' && priceCalculateResult.status === 'under' )
					{
						let message = '<?php echo $translate_locations_ua_reverse[ "message_min_price" ]; ?> ' + priceCalculateResult.value;
						
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
		
		function setLocationsSelect( selectWidgetWrapper, selectButton, selectContainer, itemsListContainer, searchField )
		{
			var selectContainerStatus = false;
			
			$( '.' + selectButton ).on( 'click', function()
			{
				if( selectContainerStatus === false )
				{
					show( $( this ) );
				}
				else
				{
					hide( $( this ) );
				}
			} );
			
			function show( selectedButton = false )
			{
				if( selectedButton === false )
				{
					$( '.' + selectContainer ).show();
				}
				else
				{
					selectedButton.parent().find( '.' + selectContainer ).show();
					selectedButton.parent().find( 'input[name="search_location"]' ).focus();
					
					let icon = selectedButton.find( '.coption-select-icon' );
					icon.removeClass( 'fa-caret-down' );
					icon.addClass( 'fa-caret-up' );
				}
					
				selectContainerStatus = true;
			}
			
			function hide( selectedButton = false )
			{
				if( selectedButton === false )
				{
					$( '.' + selectContainer ).hide();
				}
				else
				{
					selectedButton.parent().find( '.' + selectContainer ).hide();
					
					let icon = selectedButton.find( '.coption-select-icon' );
					icon.removeClass( 'fa-caret-up' );
					icon.addClass( 'fa-caret-down' );
				}
					
				selectContainerStatus = false;
			}
			
			$( document ).on( 'click', function( e )
			{
				var target = $( e.target );
				
				target = getTopParent( target, selectWidgetWrapper );
				
				if( ! target.hasClass( selectWidgetWrapper ) )
				{
					hide();
				}
			} );
			
			$( '.' + selectContainer ).on( 'click', function( e )
			{
				var target = $( e.target );
				
				if( target[ 0 ].tagName === 'LI' )
				{
					let currentItem = target.index();
					var oldTarget = target;
					
					target = getTopParent( target, selectContainer )
					target[ 0 ].selectedIndex = currentItem;
					target.parent().find( '.coption-select-title' ).text( oldTarget.text() );
					
					if( target.attr( 'name' ) === 'country' )
					{
						var citiesSelect = $( 'div[name="city"]' );
						var locationItem = $( '#location-item' );
						var cityItems = '';
						var currentCountry = citiesList[ oldTarget.attr( 'data-value' ) ];
						
						for( let i in currentCountry )
						{
							let templateLocationParams = 
							{
								LOCATION_SLUG: currentCountry[ i ],
								LOCATION_NAME: translateLocationsReverseUA[ currentCountry[ i ] ],
								SELECTED: ''
							};

							if( translateLocationsReverseUA[ currentCountry[ i ] ] !== undefined )
							{
								cityItems += templateCompilator.compile( locationItem.html(), templateLocationParams );
							}
						}
						
						if( cityItems !== '' )
						{
							citiesSelect.find( '.' + itemsListContainer ).html( cityItems );
							citiesSelect.parent().find( '.coption-select-title' ).text( translateLocationsReverseUA[ 'select_action_city' ] );
						}
						else
						{
							citiesSelect.find( '.' + itemsListContainer ).html( '' );
						}
					}
					
					hide();
					
					oldTarget.parent().find( '.location-item-active' ).removeClass( 'location-item-active' );
					oldTarget.addClass( 'location-item-active' );
				}
			} );
			
			$( '.' + searchField ).on( 'input', function( e )
			{
				let searchField = $( this );
				var searchValue = searchField.val();
				let locationsList = getTopParent( searchField, selectContainer );
				var locationsItems = locationsList.find( '.' + itemsListContainer + ' li' );
				
				locationsItems.each( function( i )
				{
					if( ( new RegExp( '^' + searchValue.toLowerCase() ) ).test( locationsItems.eq( i ).text().toLowerCase() ) === false && searchValue !== '' )
					{
						locationsItems.eq( i ).hide();
					}
					else
					{
						locationsItems.eq( i ).show();
					}
				} );
			} );
		}
		
		setLocationsSelect( 'coption-select-container', 'locations-button', 'locations-select', 'locations-select-list', 'search-location' );
	} );
</script>
	
<?php

}

?>