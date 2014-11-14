<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo lang('overal.title').' - '.$title; ?></title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/overal.css'); ?>">
		<link rel="icon" href="<?php echo site_url('img/favicon.png'); ?>">
		<?php if (isset($script)): ?>
			<script charset="UTF-8" src="<?php echo site_url('js/jquery-2.1.1.min.js'); ?>"></script>
			<script>
				<?php echo $script; ?>
			</script>
		<?php endif; ?>
	</head>
	<body>