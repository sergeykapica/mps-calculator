<div class="mps-calculator-wrapper">
	<form action="/wordpress/wp-admin/admin.php?page=mps-calculator" method="post">
		
		<?php
		
		if( ! empty( $deliveryTypesList ) )
		{
			
		?>
		
			<div class="mps-calculator-head float-left">
				<a href="/wordpress/wp-admin/admin.php?page=mps-calculator-add-delivery-type" class="delivery-action-button float-left bsizing-border-box">Додати</a>
				<button type="submit" class="delivery-action-button float-right bsizing-border-box">Видалити</button>
			</div>
			<table id="delivery-types-table">
				<thead class="dtypes-table-head">
					<tr>
						<th class="dtypes-table-field delivery-type-id"></th>
						<th class="dtypes-table-field delivery-type-title">Тип доставки</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					
					foreach( $deliveryTypesList as $deliveryType )
					{
						
					?>
					
						<tr class="dtypes-table-tr">
							<td class="dtypes-table-field delivery-type-id">
								<input type="checkbox" name="delivery-type-id[]" value="<?php echo $deliveryType->id; ?>" class="delivery-type-checkbox"/>
							</td>
							<td class="dtypes-table-field delivery-type-title">
								<span>
									<?php echo isset( $translate_strings[ $deliveryType->delivery_type ] )
											? $translate_strings[ $deliveryType->delivery_type ] : $deliveryType->delivery_type; ?>
								</span>
								<a href="/wordpress/wp-admin/admin.php?page=mps-calculator-edit-delivery-type&type=<?php echo $deliveryType->delivery_type; ?>" class="delivery-type-elink"></a>
							</td>
						</tr>
						
					<?php
					
					}
					
					?>
				</tbody>
			</table>
			
		<?php
		
		}
		else
		{
			
		?>
		
			<div class="mps-calculator-head float-left">
				<a href="/wordpress/wp-admin/admin.php?page=mps-calculator-add-delivery-type" class="delivery-action-button float-left bsizing-border-box">Додати</a>
			</div>
			<div class="types-empty">Типы доставок отсутствуют</div>
		<?php
		
		}
		
		?>
	</form>
</div>