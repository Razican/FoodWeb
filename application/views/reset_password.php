<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="main">
	<h2><?php echo lang('reset.reset'); ?></h2>

	<?php if ( ! is_null($error_msg)): ?>
		<section class="error">
			<img width="64" height="64" src="<?php echo site_url('img/error.png'); ?>" title="<?php echo lang('overal.error'); ?>">
			<?php echo $error_msg; ?>
		</section>
	<?php endif; ?>

	<?php echo form_open('reset_password'); ?>
		<div class="label">
			<label for="email"><?php echo lang('reset.email'); ?>:</label>
		</div>

		<div class="input">
			<input id="email" name="email" type="text" placeholder="<?php echo lang('reset.email_eg'); ?>"<?php if ( ! is_null($email)) echo ' value="'.$email.'"'; ?>>
		</div>

		<section class="reset">
			<p><?php echo lang('reset.question'); ?></p>

			<input id="username" name="username" type="checkbox"<?php if ($username) echo ' checked'; ?>>
			<label for="username"><?php echo lang('reset.username'); ?></label>

			<input id="password" name="password" type="checkbox"<?php if ($password) echo ' checked'; ?>>
			<label for="password"><?php echo lang('reset.password'); ?></label>
		</section>

		<div class="submit">
			<button class="white"><img width="24" height="24" src="<?php echo site_url('img/reset.png'); ?>"><?php echo lang('reset.reset_submit'); ?></button>
		</div>
	</form>

	<nav>
		<ul>
			<li><?php echo anchor('login', lang('overal.login')); ?></li>
			<li><?php echo anchor('about', lang('overal.about')); ?></li>
			<li><?php echo mailto('admin@razican.com', lang('overal.contact')); ?></li>
		</ul>
	</nav>
</section>