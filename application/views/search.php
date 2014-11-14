<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="main search">
	<p class="welcome"><?php echo $welcome; ?></p>

	<h2><?php echo lang('search.search'); ?></h2>

	<section class="error" style="display:none">
		<img src="<?php echo site_url('img/error.png'); ?>" title="<?php echo lang('overal.error'); ?>">
		<?php echo lang('search.error'); ?>
	</section>

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
					<option value="0"><?php echo lang('search.type_0'); ?></option>
					<option value="1"><?php echo lang('search.type_1'); ?></option>
					<option value="2"><?php echo lang('search.type_2'); ?></option>
					<option value="3"><?php echo lang('search.type_3'); ?></option>
					<option value="4"><?php echo lang('search.type_4'); ?></option>
					<option value="5"><?php echo lang('search.type_5'); ?></option>
				</select>
			</div>

			<div class="label">
				<label><?php echo lang('search.price'); ?>:</label>
			</div>

			<div class="input">
				<p><?php echo lang('search.between'); ?> <input name="price_min" type="number" min="0" max="100" step="0.01" value="0">€ <?php echo lang('search.and'); ?> <input name="price_max" type="number" min="0" max="100" step="0.01" value="99.99">€</p>
			</div>
		</div>
		<div class="submit">
			<button class="white"><img src="<?php echo site_url('img/search.png'); ?>"><br><?php echo lang('search.search'); ?></button>
			<img id="loading" title="<?php echo lang('search.loading'); ?>" alt="<?php echo lang('search.loading'); ?>" src="<?php echo site_url('img/loading.gif'); ?>">
		</div>
	</form>

	<section class="results">
		<div class="table">
			<div class="title row">
				<div><?php echo lang('search.name'); ?></div>
				<div><?php echo lang('search.type'); ?></div>
				<div><?php echo lang('search.brand'); ?></div>
				<div><?php echo lang('search.price'); ?></div>
			</div>
			<div class="void row"></div>
		</div>
	</section>

	<section class="description">
		<img title="<?php echo lang('search.desc_img'); ?>" alt="<?php echo lang('search.desc_img'); ?>" src="<?php echo site_url('img/missing.png'); ?>">
		<p><?php echo lang('search.name'); ?>: <span id="desc_name"></span></p>
		<p><?php echo lang('search.type'); ?>: <span id="desc_type"></span></p>
		<p><?php echo lang('search.brand'); ?>: <span id="desc_brand"></span></p>
		<p><?php echo lang('search.price'); ?>: <span id="desc_price"></span></p>
		<p><?php echo lang('search.description'); ?>: <span id="desc_desc"></span></p>
		<p><?php echo lang('search.hall'); ?>: <span id="desc_hall"></span></p>
		<p><?php echo lang('search.shelf'); ?>: <span id="desc_shelf"></span></p>
	</section>

	<nav>
		<ul>
			<li><?php echo anchor('logout', lang('overal.logout')); ?></li>
			<li><?php echo anchor('about', lang('overal.about')); ?></li>
			<li><?php echo mailto('admin@razican.com', lang('overal.contact')); ?></li>
		</ul>
	</nav>
</section>