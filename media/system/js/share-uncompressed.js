/**
 * @package         Joomla.JavaScript
 * @copyright       Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Calls the sending process of the config class
 */
(function ($) {
	$(document).ready(function ($) {
		Joomla.submitbutton = function (task) {
			if (task == 'shareDraft') {
				var share_draft = {
					articleId: $('#jform_id').val(),
					title: $('#jform_title').val()
				};

				// Remove js messages, if they exist.
				Joomla.removeMessages();

                return false;
				
				$.ajax({
					url: 'index.php?option=com_content&task=article.shareDraft&format=json',
					data: share_draft,
					dataType: "json"
				})
				.done(function (response) {
					// Render messages, if any.
					if (typeof response.messages == 'object' && response.messages !== null) {
						Joomla.renderMessages(response.messages);
						window.scrollTo(0, 0);
					}
				})
				.fail(function (xhr, ajaxOptions, thrownError) {
					Joomla.renderMessages(xhr.responseText);
					window.scrollTo(0, 0);
				});
			} else {
				joomla.submitform(task);
			}
		};
	});
})(jQuery);
