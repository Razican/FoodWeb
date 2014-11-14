<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="main search">
	<p class="welcome"><?php echo $welcome; ?></p>

	<h2><?php echo lang('search.search'); ?></h2>

	<?php if ( ! is_null($error_msg)): ?>
		<section class="error">
			<img src="<?php echo site_url('img/error.png'); ?>" title="<?php echo lang('overal.error'); ?>">
			<?php echo $error_msg; ?>
		</section>
	<?php endif; ?>

	<?php echo form_open('search'); ?>
		<div class="form">
			<div class="label">
				<label for="name"><?php echo lang('search.name'); ?>:</label>
			</div>

			<div class="input">
				<input id="name" name="name" type="text" placeholder="<?php echo lang('search.name_eg'); ?>">
			</div>

			<div class="label">
				<label for="brand"><?php echo lang('search.brand'); ?>:</label>
			</div>

			<div class="input">
				<input id="brand" name="brand" type="text" placeholder="<?php echo lang('search.brand_eg'); ?>">
			</div>

			<div class="label">
				<label for="type"><?php echo lang('search.type'); ?>:</label>
			</div>

			<div class="input">
				<select id="type" name="type">
					<option value="vegetables" selected><?php echo lang('search.vegetables'); ?></option>
				</select>
			</div>

			<div class="label">
				<label><?php echo lang('search.price'); ?>:</label>
			</div>

			<div class="input">
				<p><?php echo lang('search.between'); ?> <input type="number" min="0" max="100" step="0.25" value="0">€ <?php echo lang('search.and'); ?> <input type="number" min="0" max="100" step="0.25" value="99.99">€</p>
			</div>
		</div>
		<div class="submit">
			<button class="white"><img src="<?php echo site_url('img/search.png'); ?>"><br><?php echo lang('search.search'); ?></button>
		</div>
	</form>

	<nav>
		<ul>
			<li><?php echo anchor('logout', lang('overal.logout')); ?></li>
			<li><?php echo anchor('about', lang('overal.about')); ?></li>
			<li><?php echo mailto('admin@razican.com', lang('overal.contact')); ?></li>
		</ul>
	</nav>
</section>