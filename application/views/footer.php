<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		<?php if (isset($script)): ?>
			<script charset="UTF-8" src="<?php echo site_url('js/jquery-2.1.1.min.js'); ?>"></script>
			<script>
				<?php echo $script; ?>
			</script>
		<?php endif; ?>
	</body>
</html>