<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="main">
	<h2><?php echo lang('login.login'); ?></h2>

	<?php if ( ! is_null($error_msg)): ?>
		<section class="error">
			<img src="<?php echo site_url('img/error.png'); ?>" title="<?php echo lang('overal.error'); ?>">
			<?php echo $error_msg; ?>
		</section>
	<?php endif; ?>
	
	<?php echo form_open('/'); ?>
		<label for="username"><?php echo lang('login.username'); ?>:</label>
		<input id="username" name="username" type="text" placeholder="<?php echo lang('login.username_eg'); ?>"<?php if ( ! is_null($username)) echo ' value="'.$username.'"'; ?>>
		<br>
		<label for="password"><?php echo lang('login.password'); ?>:</label>
		<input id="password" name="password" type="password" placeholder="<?php echo lang('login.password_eg'); ?>">
		<br>
		<button class="white"><img src="<?php echo site_url('img/key.png'); ?>"><?php echo lang('login.login'); ?></button>
		<?php echo anchor('reset_password', lang('login.reset_password'));?>
	</form>

	<nav>
		<ul>
			<li><?php echo anchor('register', lang('overal.register')); ?></li>
			<li><?php echo anchor('about', lang('overal.about')); ?></li>
			<li><?php echo mailto('admin@razican.com', lang('overal.contact')); ?></li>
		</ul>
	</nav>
</section>