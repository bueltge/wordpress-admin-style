(function ($) {

	// Accordion
	$('#accordion').accordion({header: 'h3'});

	// Tabs
	$('#tabs').tabs();

	// Dialog
	$('#dialog').dialog({
		autoOpen: false,
		width: 600,
		modal: true,
		buttons: {
			'Ok': function () {
				$(this).dialog('close');
			},
			'Cancel': function () {
				$(this).dialog('close');
			}
		}
	});

	// Dialog Link
	$('#dialog_link').on('click', function () {
		$('#dialog').dialog('open');
		// Make the overlay fill the whole screen
		$('.ui-widget-overlay').width($(document).width());
		$('.ui-widget-overlay').height($(document).height());
		$('.ui-dialog').css('z-index', '9999');
		return false;
	});

	// Datepicker
	$('#datepicker').datepicker({
		inline: true
	});

	// Slider
	$('#slider').slider({
		range: true,
		values: [17, 67]
	});

	// Progressbar
	$('#progressbar').progressbar({
		value: 20
	});

	// Hover states on the static widgets.
	$('#dialog_link, ul#icons li').on('hover',
		function () {
			$(this).addClass('ui-state-hover');
		},
		function () {
			$(this).removeClass('ui-state-hover');
		}
	);

	// Autocomplete
	var availableTags = [
		'ActionScript',
		'AppleScript',
		'Asp',
		'BASIC',
		'C',
		'C++',
		'Clojure',
		'COBOL',
		'ColdFusion',
		'Erlang',
		'Fortran',
		'Groovy',
		'Haskell',
		'Java',
		'JavaScript',
		'Lisp',
		'Perl',
		'PHP',
		'Python',
		'Ruby',
		'Scala',
		'Scheme'
	];
	$('#autocomplete').autocomplete({
		source: availableTags
	});
	$('#autocomplete-core').autocomplete({
		source: availableTags,
		position: ('undefined' !== typeof isRtl && isRtl) ? {
			my: 'right top',
			at: 'right bottom',
			offset: '0, -1'
		} : {offset: '0, -1'},
		open: function () {
			$(this).addClass('open');
		},
		close: function () {
			$(this).removeClass('open');
		}
	});

})(jQuery);
