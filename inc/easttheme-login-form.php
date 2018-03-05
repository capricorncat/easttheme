<?php


function easttheme_login_form( $args = array() ) {
	
	$login_url = site_url( 'wp-login.php', 'login_post' );
	$redirect  = ( is_ssl() ? 'https://' : 'http://' ) . 
							$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
	?>
	<form name="loginform" id="loginform" class="ui mini form" 
				action="<?php echo $login-url; ?>" method="post">

		<div class="field login-username">
			<label for="user_login"><?php _e( 'Username' ); ?></label>
			<input type="text" name="log" size="20" class="input" id="user_login" value="" />
		</div>

		<div class="field login-password">
			<label for="user_pass"><?php _e( 'Password' ); ?></label>
			<input type="password" name="pwd" value="" size="20" class="" id="user_pass" />
		</div>

		<div class="field login-remember">
			<label for="rememberme"><?php _e( 'Remember Me' ); ?></label>
			<input name="rememberme" type="checkbox" value="forever" 
						 id="rememberme" />
		</div>
		
		<div class="field login-submit">
			<input type="submit" name="wp-submit" id="wp-submit" 
						 class="ui submit button" value="<?php _e( 'Log In' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php echo $redirect; ?>" />
		</div>
	</form>
	<?php
}

?>