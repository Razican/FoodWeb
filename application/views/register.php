<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="main">
	<h2><?php echo lang('register.register'); ?></h2>

	<?php if ( ! is_null($error_msg)): ?>
		<section class="error">
			<img src="<?php echo site_url('img/error.png'); ?>" title="<?php echo lang('overal.error'); ?>">
			<?php echo $error_msg; ?>
		</section>
	<?php endif; ?>

	<?php echo form_open('/'); ?>
		<label for="name"><?php echo lang('register.name'); ?>:</label>
		<input id="name" name="name" type="text" placeholder="<?php echo lang('register.name_eg'); ?>"<?php if ( ! is_null($name)) echo ' value="'.$name.'"'; ?>>
		<br>
		<label for="lastname"><?php echo lang('register.lastname'); ?>:</label>
		<input id="lastname" name="lastname" type="text" placeholder="<?php echo lang('register.lastname_eg'); ?>"<?php if ( ! is_null($lastname)) echo ' value="'.$lastname.'"'; ?>>
		<br>
		<label for="email"><?php echo lang('register.email'); ?>:</label>
		<input id="email" name="email" type="email" placeholder="<?php echo lang('register.email_eg'); ?>"<?php if ( ! is_null($email)) echo ' value="'.$email.'"'; ?>>
		<br>
		<label for="username"><?php echo lang('register.username'); ?>:</label>
		<input id="username" name="username" type="text" placeholder="<?php echo lang('register.username_eg'); ?>"<?php if ( ! is_null($username)) echo ' value="'.$username.'"'; ?>>
		<br>
		<label for="password"><?php echo lang('register.password'); ?>:</label>
		<input id="password" name="password" type="password" placeholder="<?php echo lang('login.password_eg'); ?>">
		<br>
		<label for="passconf"><?php echo lang('register.passconf'); ?>:</label>
		<input id="passconf" name="passconf" type="password" placeholder="<?php echo lang('register.passconf_eg'); ?>">
		<br>
		<label><?php echo lang('register.health'); ?>:</label>
		<input id="gluten" name="gluten" type="checkbox"<?php if ($gluten) echo ' checked'; ?>>
		<label for="gluten"><?php echo lang('register.gluten'); ?></label>

		<input id="diabetes" name="diabetes" type="checkbox"<?php if ($diabetes) echo ' checked'; ?>>
		<label for="diabetes"><?php echo lang('register.diabetes'); ?></label>
		<br>
		<input id="vegetables" name="vegetables" type="checkbox"<?php if ($vegetables) echo ' checked'; ?>>
		<label for="vegetables"><?php echo lang('register.vegetables'); ?></label>

		<input id="milk" name="milk" type="checkbox"<?php if ($milk) echo ' checked'; ?>>
		<label for="milk"><?php echo lang('register.milk'); ?></label>
		<br>
		<button class="white"><img src="<?php echo site_url('img/register.png'); ?>"><?php echo lang('register.register'); ?></button>
	</form>
</section>