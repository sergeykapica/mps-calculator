( function()
{
	window.getTopParent = function( target, parentClass )
	{
		while( ! target.hasClass( parentClass ) && target[ 0 ] !== document.body )
		{
			target = target.parent();
		}
		
		return target;
	};
} )();