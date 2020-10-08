<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'login' ); ?>
	<?php $template->the_errors(); ?>
	
	<?php do_action( 'login_form' ); ?>
	<dl id="acMenu">
	<dt>管理者</dt>
	<dd>
		<form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">
			<p>
				<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username' ); ?></label>
				<input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
			</p>
			<p>
				<label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password' ); ?></label>
				<input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input" value="" size="20" />
			</p>
			<p class="forgetmenot">
				<input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
				<label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me' ); ?></label>
			</p>
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In' ); ?>" />
				<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
				<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
				<input type="hidden" name="action" value="login" />
			</p>
		</form>
	</dd>
	</dl>
</div>
<style type="text/css">
<!--
#acMenu dt{
    color: #aaa;
    display:block;
    padding:2px 0 0 5px;
    border:#aaa 1px solid;
}
#acMenu dd{
    background:#f2f2f2;
    padding:10px;
    display:none;
    border:#666 1px solid;
}
-->
</style>
<script>
    $(function(){
        $("#acMenu dt").on("click", function() {
            $(this).next().slideToggle("fast");
        });
    });
</script>