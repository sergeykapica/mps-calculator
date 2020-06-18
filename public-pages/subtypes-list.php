<div class="locations-button">
	<span class="coption-select-title"><?php echo $params[ 'data_title' ]; ?></span>
	<span class="coption-select-icon fa fa-caret-down float-right"></span>
</div>
<div class="locations-select border-radius-10px" name="<?php echo $params[ 'data_type' ]; ?>">
	<ul class="locations-select-list">
	
		<?php
		
		foreach( $params[ 'data_list' ] as $d_type )
		{
			
		?>
		
			<li data-value="<?php echo $d_type[ 'slug' ]; ?>" data-delivery-type="<?php echo $d_type[ 'delivery_type' ]; ?>" class="locations-select-item"><?php echo $d_type[ 'title' ]; ?></li>
		
		<?php
		
		}
		
		?>
	</ul>
</div>