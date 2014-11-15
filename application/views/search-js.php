<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
$(document).ready(function () {

	var results = new Array();

	var show_description = function(product) {
					$('.search .description img').attr('src', "<?php echo site_url('img/products'); ?>/"+product.id+".jpg");

					$('#desc_name').html(product.name);
					$('#desc_type').html(product.type);
					$('#desc_brand').html(product.brand);
					$('#desc_price').html(product.price+"€");
					$('#desc_desc').html(product.desc);
					$('#desc_hall').html(product.hall);
					$('#desc_shelf').html(product.shelf);
				};

	$("button").click(function (event) {
		event.preventDefault();

		$('#loading').show();

		var form = $('form').serialize();

		results = new Array();
		$('.search .table .row:not(.void):not(.title)').remove();
		$('.error').hide();
		$('form input[type="hidden"]').remove();
		$('.search .description img').attr('src', "<?php echo site_url('img/missing.png'); ?>");
		$('.search .description span').html('');

		$.post("<?php echo site_url('search'); ?>", form,
			function(data) {

				if (data.length === 1)
					$('.error').show();

				$.each(data, function(index, product) {

					if (index === 0) {

						csrf = product;

						$('form').append(
							$('<input>')
								.attr('type', 'hidden')
								.attr('name', csrf.name)
								.attr('value', csrf.token).hide());
					} else {

						results[index-1] = product;

						$('.search .table .void.row').before(
							$('<div>').attr('class', 'row'+(data.length === 2 ? " selected" : ""))
								.append(
									$('<div>').html(product.name))
								.append(
									$('<div>').html(product.type))
								.append(
									$('<div>').html(product.brand))
								.append(
									$('<div>').html(product.price + "€"))
							);

						if (data.length === 2) show_description(product);
					}
				});

				$(".search .table .row:not(.title):not(.void)").click(function () {
					product = results[$(this).index('.search .table .row:not(.title)')];

					$('.search .table .row').removeClass('selected');
					$(this).addClass('selected');

					show_description(product);
				});

				$('#loading').hide();

			}, "json");
	});

	$('input[type="number"]').change(function() {

		if ($(this).val() != '' && Number($('input[name="price_min"]').val()) > Number($('input[name="price_max"]').val())) {

			if ($(this).attr('name') === 'price_min')
				$('input[name="price_max"]').val($(this).val());
			else
				$('input[name="price_min"]').val($(this).val());
		}
	});
});