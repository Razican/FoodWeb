<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="main">
	<h2><?php echo lang('about.about'); ?></h2>

	<section class="text">
		<?php echo lang('about.text'); ?>
	</section>

	<nav>
		<ul>

			<?php if ($logged_in): ?>
				<li><?php echo anchor('logout', lang('overal.logout')); ?></li>
				<li><?php echo anchor('search', lang('overal.search')); ?></li>
			<?php else: ?>
				<li><?php echo anchor('register', lang('overal.register')); ?></li>
				<li><?php echo anchor('/', lang('overal.login')); ?></li>
			<?php endif; ?>
			<li><?php echo mailto('admin@razican.com', lang('overal.contact')); ?></li>
		</ul>
	</nav>
</section>