( function()
{
	var actionNotify = $( '.action-notify' );
	
	setTimeout( function()
	{
		actionNotify.removeClass( 'notify-up' );
		actionNotify.addClass( 'notify-down' );

		actionNotify.on( 'animationend', function()
		{
			actionNotify.remove();
		} );
	}, 2000 );
} )();