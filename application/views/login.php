<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="main">
	<h2><?php echo lang('login.login'); ?></h2>
	<?php if (isset($error_msg)): ?>
		<section class="error"><?php echo $error_msg; ?></section>
	<?php endif; ?>
	<?php echo form_open('/'); ?>
		<label for="username"><?php echo lang('login.username'); ?>:</label>
		<input id="username" name="username" type="text" placeholder="<?php echo lang('login.username_eg'); ?>">
		<br>
		<label for="password"><?php echo lang('login.password'); ?>:</label>
		<input id="password" name="password" type="password" placeholder="<?php echo lang('login.password_eg'); ?>">
		<br>
		<input type="submit" value="<?php echo lang('login.login'); ?>">
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