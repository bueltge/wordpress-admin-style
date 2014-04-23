/* Dashicons Picker */

(function($) {

	$.fn.dashiconsPicker = function( options ) {
		var icons = [
			"menu",
			"site",
			"gauge",
			"admin-dashboard",
			"admin-post",
			"admin-media",
			"admin-links",
			"admin-page",
			"admin-comments",
			"admin-appearance",
			"admin-plugins",
			"admin-users",
			"admin-tools",
			"admin-settings",
			"admin-site",
			"admin-generic",
			"admin-collapse",	
			"welcome-write-blog",
			"welcome-add-page",
			"welcome-view-site",
			"welcome-widgets-menus",
			"welcome-comments",
			"welcome-learn-more",
			"format-aside",
			"format-image",
			"format-gallery",
			"format-video",
			"format-status",
			"format-quote",
			"format-chat",
			"format-audio",
			"camera2",
			"images-alt1",
			"images-alt2",
			"video-alt1",
			"video-alt2",
			"video-alt3",
			"imgedit-crop",
			"imgedit-rleft",
			"imgedit-rright",
			"imgedit-flipv",
			"imgedit-fliph",
			"imgedit-undo",
			"imgedit-redo",		
			"align-left",
			"align-right",	
			"align-center",
			"align-none",
			"lock",
			"calendar",
			"visibility",
			"post-status",
			"tinymce-bold",
			"tinymce-italic",	
			"tinymce-ul",
			"tinymce-ol",
			"tinymce-quote",
			"tinymce-alignleft",
			"tinymce-aligncenter",
			"tinymce-alignright",
			"tinymce-insertmore",
			"tinymce-spellcheck",
			"tinymce-distractionfree",
			"tinymce-kitchensink",
			"tinymce-underline",
			"tinymce-justify",
			"tinymce-textcolor",
			"tinymce-word",
			"tinymce-plaintext",
			"tinymce-removeformatting",
			"tinymce-video",
			"tinymce-customchar",
			"tinymce-outdent",
			"tinymce-indent",
			"tinymce-help",
			"tinymce-strikethrough",
			"tinymce-unlink",
			"tinymce-rtl",
			"editor-contract",
			"editor-break",
			"editor-code",
			"editor-paragraph",
			"arr-up",
			"arr-down",
			"arr-right",
			"arr-left",
			"sort",
			"leftright",
			"list-view",
			"exerpt-view",
			"external",
			"randomize",
			"share",
			"share2",
			"share3",
			"twitter1",
			"twitter2",
			"rss",
			"facebook1",
			"facebook2",
			"jobs-developers",
			"jobs-designers",
			"jobs-migration",
			"jobs-performance",
			"wordpress",
			"pressthis",
			"update",
			"screenoptions",
			"cart",
			"feedback",
			"cloud",
			"lock",
			"backup",
			"arrow-down",
			"arrow-up",
			"tag",
			"category",
			"yes",
			"no",
			"plus-small",
			"xit",
			"marker",	
			"star-filled",
			"star-empty",	
			"flag",
			"location",
			"location-alt",	
			"vault",
			"search",
			"slides",
			"analytics",
			"piechart",
			"bargraph",
			"bargraph2",
			"bargraph3",
			"groups",
			"products",
			"awards",
			"forms",
			"portfolio",
			"microphone",
			"media-archive",
			"media-audio",
			"media-code",
			"media-default",
			"media-document",
			"media-interactive",
			"media-spreadsheet",
			"media-text",
			"media-video",
			"playlist-audio",
			"playlist-video",
			"universal-access",
			"universal-access-alt",
			"tickets",
			"nametag",
			"clipboard",
			"heart",
			"megaphone",
			"schedule",
			"archive",
			"tagcloud",
			"text",
			"plus-alt"
		];

		return this.each( function() {

			var $button = $(this);

			$button.on('click.dashiconsPicker', function() {
				createPopup($button);
			});

			function createPopup($button) {

				$target = $($button.data('target'));

				$popup = $('<div class="dashicon-picker-container"> \
						<div class="dashicon-picker-control" /> \
						<ul class="dashicon-picker-list" /> \
					</div>')
					.css({
						'top': $button.offset().top,
						'left': $button.offset().left
					});

				var $list = $popup.find('.dashicon-picker-list');
				for (var i in icons) {
					$list.append('<li data-icon="'+icons[i]+'"><a href="#" title="'+icons[i]+'"><span class="dashicons dashicons-'+icons[i]+'"></span></a></li>');
				};

				$('a', $list).click(function(e) {
					e.preventDefault();
					var title = $(this).attr("title");
					$target.val("dashicons-"+title);
					removePopup();
				});

				var $control = $popup.find('.dashicon-picker-control');
				$control.html('<a data-direction="back" href="#"><span class="dashicons dashicons-arrow-left-alt2"></span></a> \
				<input type="text" class="" placeholder="Search" /> \
				<a data-direction="forward" href="#"><span class="dashicons dashicons-arrow-right-alt2"></span></a>');

				$('a', $control).click(function(e) {
					e.preventDefault();
					if ($(this).data('direction') === 'back') {
						//move last 25 elements to front
						$('li:gt(' + (icons.length - 26) + ')', $list).each(function() {
							$(this).prependTo($list);
						});
					} else {
						//move first 25 elements to the end
						$('li:lt(25)', $list).each(function() {
							$(this).appendTo($list);
						});
					}
				});

				$popup.appendTo('body').show();

				$('input', $control).on('keyup', function(e) {
					var search = $(this).val();
					if (search === '') {
						//show all again
						$('li:lt(25)', $list).show();
					} else {
						$('li', $list).each(function() {
							if ($(this).data('icon').toLowerCase().indexOf(search.toLowerCase()) !== -1) {
								$(this).show();
							} else {
								$(this).hide();
							}
						});
					}
				});

				$(document).mouseup(function (e){
					if (!$popup.is(e.target) && $popup.has(e.target).length === 0) {
						removePopup();
					}
				});
			}

			function removePopup(){
				$(".dashicon-picker-container").remove();
			}
		});
	}

	$(function() {
		$('.dashicons-picker').dashiconsPicker();
	});

}(jQuery));