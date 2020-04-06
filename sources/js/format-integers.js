( function()
{
	window.formatFloat = function( value )
	{
		return value.replace( /(\d+?),(\d+)/, '$1.$2' ) * 1;
	}
} )();