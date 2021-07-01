<?php
if ( ! current_user_can( 'manage_options' )) {
	wp_die(__ ( 'No tienes permisos para acceder.' ) );
}
?>
	<div class="wrap">
		<h2>Stripe form gutenberg</h2>
		<p>Esta es la configuración de la API secreta y pública de stripe</p>

		<form action="options.php" method="POST">
			<?php
				settings_fields( 'mmr-stripe-settings' );
				do_settings_sections( 'mmr-stripe-settings' ); 
			?>
			<table class="form-table">
				<tr>
					<td>
						<label>API secreta</label>
						<input type="text" name="mmr_stripe_api_secret" id="mmr_stripe_api_secret" value="<?php echo get_option( 'mmr_stripe_api_secret' ); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label>API pública</label>
						<input type="text" name="mmr_stripe_api_public" id="mmr_stripe_api_public" value="<?php echo get_option( 'mmr_stripe_api_public' ); ?>" />
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>