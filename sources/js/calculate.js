( function()
{
	window.Calculate =
	{
		getCapacity: function( width, length, height, ethalonValue )
		{
			// in meters

			let calculate = ( width * length * height ) * ethalonValue;
			
			return calculate.toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' );
		},
		
		getEthalon: function( weight, ethalon )
		{
			return ( weight * ethalon ).toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' ) * 1;
		},
		
		getPriceByWeight: function( calculateData, params )
		{
			for( dataKey in calculateData )
			{
				let currentCountry = calculateData[ dataKey ];
				
				currentCountry.country = currentCountry.country.toLowerCase();
				currentCountry.city = currentCountry.city.toLowerCase();
				params.paramCountry = params.paramCountry !== '' ? params.paramCountry.toLowerCase() : params.paramCountry;
				params.paramCity = params.paramCity !== undefined ? params.paramCity.toLowerCase() : params.paramCity;
				
				if( params.paramCountry == currentCountry.country && currentCountry.city !== undefined && params.paramCity == currentCountry.city || params.onlyCountry !== undefined && params.paramCountry == currentCountry.country )
				{
					for( paramKey in currentCountry.params.weight_list )
					{
						var currentParamsWeight = currentCountry.params.weight_list[ paramKey ];
						
						if( params.calculatedWeight < currentParamsWeight.kg )
						{
							if( paramKey == 0 )
							{
								if( currentCountry.delivery_type !== 'cargo' )
								{
									let currentWeightData = currentCountry.params.weight_list[ 0 ];
									
									var calculatedPrice = params.calculatedWeight * currentWeightData.price_for_each_kg;
								}
								else
								{
									var calculatedPrice = params.calculatedWeight * currentCountry.params.optimal_price;
								}
								
								calculatedPrice = parseFloat( calculatedPrice + ( calculatedPrice * params.fuelIncrease ) ).toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' );
							}
							else
							{
								if( currentCountry.delivery_type !== 'cargo' )
								{
									let prevWeightData = currentCountry.params.weight_list[ paramKey - 1 ];
									let additionalWeight = params.calculatedWeight - prevWeightData.kg;
									
									//console.log( params );
									
									var calculatedPrice = prevWeightData.price + ( additionalWeight * prevWeightData.price_for_each_kg );
								}
								else
								{
									let prevWeightData = currentCountry.params.weight_list[ paramKey - 1 ];
									
									var calculatedPrice = params.calculatedWeight * prevWeightData.price;
								}
								
								calculatedPrice = parseFloat( calculatedPrice + ( calculatedPrice * params.fuelIncrease ) ).toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' );
							}
							
							if( currentParamsWeight.kg <= params.minPriceMaxSegment && calculatedPrice < currentCountry.params.min_price )
							{
								return {
                                    status: 'under',
                                    value: currentCountry.delivery_type === 'cargo' ? ( ( currentCountry.params.optimal_price * params.calculatedWeight ) * params.fuelIncrease ).toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' ) : currentCountry.params.min_price.toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' ) + ( currentCountry.params.min_price.toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' ) * params.fuelIncrease )
                                };
							}
                            
							return calculatedPrice * 1;
						}
						else if( params.calculatedWeight == currentParamsWeight.kg )
						{	
							var calculatedPrice = currentParamsWeight.price;
							
							calculatedPrice = parseFloat( calculatedPrice + ( calculatedPrice * params.fuelIncrease ) ).toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' );
							
							if( currentParamsWeight.kg <= params.minPriceMaxSegment && calculatedPrice < currentCountry.params.min_price )
							{
                                return {
                                    status: 'under',
                                    value: currentCountry.delivery_type === 'cargo' ? ( ( currentCountry.params.optimal_price * params.calculatedWeight ) * params.fuelIncrease ).toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' ) : currentCountry.params.min_price.toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' ) + ( currentCountry.params.min_price.toString().replace( /^(\d+)?\.(\d{2})\d+/, '$1.$2' ) * params.fuelIncrease )
                                };
							}
							
                            return calculatedPrice * 1;
						}
						else
						{
							if( params.calculatedWeight > currentCountry.params.weight_list[ currentCountry.params.weight_list.length - 1 ].kg )
							{
                                return {
                                    status: 'undetermined'
                                };
							}
						}
					}
					
					break;
				}
			}
		}
	}
} )();