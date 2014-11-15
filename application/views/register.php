<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="main">
	<h2><?php echo lang('register.register'); ?></h2>

	<?php if ( ! is_null($error_msg)): ?>
		<section class="error">
			<img width="64" height="64" src="<?php echo site_url('img/error.png'); ?>" title="<?php echo lang('overal.error'); ?>">
			<?php echo $error_msg; ?>
		</section>
	<?php endif; ?>

	<?php echo form_open('register'); ?>
		<div class="label">
			<label for="name"><?php echo lang('register.name'); ?>:</label>
		</div>
		<div class="input">
			<input id="name" name="name" type="text" placeholder="<?php echo lang('register.name_eg'); ?>"<?php if ( ! is_null($name)) echo ' value="'.$name.'"'; ?>>
		</div>

		<div class="label">
			<label for="lastname"><?php echo lang('register.lastname'); ?>:</label>
		</div>
		<div class="input">
			<input id="lastname" name="lastname" type="text" placeholder="<?php echo lang('register.lastname_eg'); ?>"<?php if ( ! is_null($lastname)) echo ' value="'.$lastname.'"'; ?>>
		</div>

		<div class="label">
			<label for="email"><?php echo lang('register.email'); ?>:</label>
		</div>
		<div class="input">
			<input id="email" name="email" type="email" placeholder="<?php echo lang('register.email_eg'); ?>"<?php if ( ! is_null($email)) echo ' value="'.$email.'"'; ?>>
		</div>

		<div class="label">
			<label for="username"><?php echo lang('register.username'); ?>:</label>
		</div>
		<div class="input">
			<input id="username" name="username" type="text" placeholder="<?php echo lang('register.username_eg'); ?>"<?php if ( ! is_null($username)) echo ' value="'.$username.'"'; ?>>
		</div>

		<div class="label">
			<label for="password"><?php echo lang('register.password'); ?>:</label>
		</div>
		<div class="input">
			<input id="password" name="password" type="password" placeholder="<?php echo lang('register.password_eg'); ?>">
		</div>

		<div class="label">
			<label for="passconf"><?php echo lang('register.passconf'); ?>:</label>
		</div>
		<div class="input">
			<input id="passconf" name="passconf" type="password" placeholder="<?php echo lang('register.passconf_eg'); ?>">
		</div>

		<div class="label">
			<label><?php echo lang('register.health'); ?>:</label>
		</div>
		<div class="input">

			<div class="left">
				<input id="gluten" name="gluten" type="checkbox"<?php if ($gluten) echo ' checked'; ?>>
				<label for="gluten"><?php echo lang('register.gluten'); ?></label>
			</div>

			<div class="right">
				<input id="diabetes" name="diabetes" type="checkbox"<?php if ($diabetes) echo ' checked'; ?>>
				<label for="diabetes"><?php echo lang('register.diabetes'); ?></label>
			</div>

			<div class="left">
				<input id="vegetables" name="vegetables" type="checkbox"<?php if ($vegetables) echo ' checked'; ?>>
				<label for="vegetables"><?php echo lang('register.vegetables'); ?></label>
			</div>

			<div class="right">
				<input id="milk" name="milk" type="checkbox"<?php if ($milk) echo ' checked'; ?>>
				<label for="milk"><?php echo lang('register.milk'); ?></label>
			</div>
		</div>

		<div class="submit">
			<button class="white"><img width="24" height="24" src="<?php echo site_url('img/register.png'); ?>"><?php echo lang('register.register'); ?></button>
		</div>
	</form>

	<nav>
		<ul>
			<li><?php echo anchor('/', lang('overal.login')); ?></li>
			<li><?php echo anchor('about', lang('overal.about')); ?></li>
			<li><?php echo mailto('admin@razican.com', lang('overal.contact')); ?></li>
		</ul>
	</nav>
</section>