( function()
{
	function Validator( params )
    {
    	var oValidator = this;
    
    	oValidator.validateFields = function( callback = false )
        {
            for( let p in params )
            {
                var currentFields = $( 'input[name="' + params[ p ].name + '"]' )[ 0 ] || $( 'select[name="' + params[ p ].name + '"]' )[ 0 ];
				currentFields = $( currentFields );
				
                for( let c in currentFields )
                {
					if( ! isNaN( c * 1 ) )
					{
						let currentField = currentFields.eq( c );
						let currentParams = params[ p ].params;
						
						for( let cp in currentParams )
						{
							if( cp === 'isEmpty' && currentField.val() === '' && currentParams.anotherField !== undefined && $( 'input[name="' + currentParams.anotherField + '"]' ).eq( c ).val() === '' )
							{
								if( currentParams.notifyMessageIndent === undefined )
								{
									oValidator.generateMessage( currentField, 'Введіть значення' );
								}
								else
								{
									oValidator.generateMessage( currentField, 'Введіть значення', currentParams.notifyMessageIndent );
								}

								break;
							}
							else if( cp === 'minNumber' && formatFloat( currentField.val() ) * 1 < currentParams[ cp ] 
								&& currentParams.anotherField !== undefined && $( 'input[name="' + currentParams.anotherField + '"]' ).eq( c ).val() === ''
								|| cp === 'minNumber' && formatFloat( currentField.val() ) * 1 < currentParams[ cp ] && currentParams.anotherField === undefined )
							{
								if( currentParams.notifyMessageIndent === undefined )
								{
									oValidator.generateMessage( currentField, 'Мінімальне число ' + currentParams[ cp ] );
								}
								else
								{
									oValidator.generateMessage( currentField, 'Мінімальне число ' + currentParams[ cp ], currentParams.notifyMessageIndent );
								}

								break;
							}
							else if( cp === 'isNumber' && isNaN( formatFloat( currentField.val() ) * 1 ) && currentParams.anotherField !== undefined 
								&& $( 'input[name="' + currentParams.anotherField + '"]' ).eq( c ).val() === '' || cp === 'isNumber' && isNaN( formatFloat( currentField.val() ) * 1 )
								&& currentParams.anotherField === undefined )
							{
								if( currentParams.notifyMessageIndent === undefined )
								{
									oValidator.generateMessage( currentField, 'Введенне значення ' );
								}
								else
								{
									oValidator.generateMessage( currentField, 'Введенне значення не є числом', currentParams.notifyMessageIndent );
								}

								break;
							}
							else if( cp == 'isSelect' && currentField[ 0 ].selectedIndex <= 0 )
							{
								if( currentParams.notifyMessageIndent === undefined )
								{
									if( currentParams.additionalField === undefined )
									{
										oValidator.generateMessage( currentField, 'Виберіть хоча б один пункт' );
									}
									else
									{
										oValidator.generateMessage( currentField, 'Виберіть хоча б один пункт', undefined, currentParams.additionalField );
									}
								}
								else
								{
									if( currentParams.additionalField === undefined )
									{
										oValidator.generateMessage( currentField, 'Виберіть хоча б один пункт' );
									}
									else
									{
										oValidator.generateMessage( currentField, 'Виберіть хоча б один пункт', currentParams.notifyMessageIndent, currentParams.additionalField );
									}
								}
							}
						}
					}
                }
            }
			
			if( callback )
			{
				callback();
			}
        };
        
        oValidator.generateMessage = function( currentField, message, notifyMessageIndent, field )
        {
        	currentField.addClass( 'validate-error' );
            
            let errorMessage = document.createElement( 'div' );
            errorMessage.classList.add( 'validate-error-content' );
            errorMessage.classList.add( 'bsizing-border-box' );
            errorMessage.classList.add( 'border-radius-5px' );
            errorMessage.style.width = currentField[0].offsetWidth + 'px';
            errorMessage.innerText = message;
			
			if( notifyMessageIndent !== undefined )
			{
				errorMessage.style.top = notifyMessageIndent;
			}

			if( field !== undefined )
			{
				field.classList.add( 'validate-error' );
			}

            currentField.parent().append( errorMessage );
        };
		
		oValidator.checkErrors = function( container, errorsList )
		{
			for( let e in errorsList )
			{
				let currentErrorData = errorsList[ e ];
				let currentError = container.find( '.' + currentErrorData.name );
				
				if( currentError[0] === undefined && e == 0 )
				{
					return false;
				}
				else
				{
					if( currentErrorData.remove !== undefined )
					{
						currentError.remove();
					}
					else if( currentErrorData.removeClass !== undefined )
					{
						currentError.removeClass( currentErrorData.name );
					}
				}
			}
			
			return true;
		};
    }
	
	window.Validator = Validator;
} )();