<div id="delivery-action-wrapper">
	<h2><?php echo $translate_strings[ 'add_new_type' ]; ?></h2>
	<form action="/wordpress/wp-admin/admin.php?page=mps-calculator-add-delivery-type" method="post" id="add-dtype-form">
		<section class="dtype-form-section">
			<input type="text" name="delivery_type" placeholder="<?php echo $translate_strings[ 'delivery_type' ]; ?>" class="dform-input"/>
		</section>
		<section class="dtype-form-section">
			<textarea name="delivery_description" placeholder="<?php echo $translate_strings[ 'description' ]; ?>" class="dform-textarea dform-input"></textarea>
		</section>
		<section class="dtype-form-section">
			<input type="text" name="delivery_fuel_increase" placeholder="<?php echo $translate_strings[ 'fuel_increase' ]; ?>" class="dform-input"/>
		</section>
		<section class="dtype-form-section">
			<input type="text" name="delivery_ethalon_parcels" placeholder="<?php echo $translate_strings[ 'ethalon_parcels' ]; ?>" class="dform-input"/>
		</section>
		<section class="dtype-form-section">
			<input type="text" name="delivery_ethalon_documents" placeholder="<?php echo $translate_strings[ 'ethalon_documents' ]; ?>" class="dform-input"/>
		</section>
		<section class="dtype-form-section">
			<input type="text" name="delivery_max_min_price" placeholder="<?php echo $translate_strings[ 'delivery_max_min_price' ]; ?>" class="dform-input"/>
		</section>
		<section class="dtype-form-section">
			<button type="submit" class="delivery-action-button float-left bsizing-border-box"><?php echo $translate_strings[ 'add' ]; ?></button>
		</section>
	</form>
	
	<?php
	
	if( isset( $data_action_status ) )
	{
		if( $data_action_status === true )
		{
	?>
		<div class="action-notify notify-up"><?php echo $translate_strings[ 'data_added_success' ]; ?></div>
	<?php
	
		}
		else
		{
		
	?>
		<div class="action-notify notify-up"><?php echo $translate_strings[ 'data_added_failed' ]; ?></div>
	<?php
	
		}
	
	?>
	
		<script type="text/javascript" src="<?php echo plugins_url( 'mps-calculator/sources/js/action-notify.js' ); ?>"></script>
	
	<?php
	
	}
	
	?>
</div>