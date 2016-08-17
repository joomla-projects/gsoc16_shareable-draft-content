/**
 * @package         Joomla.JavaScript
 * @copyright       Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Calls the sending process of the config class
 */
var shareDraft;

jQuery(document).ready(function($)
{
	shareDraft = function () {
		var share_draft = {
			id: articleId,
		};

		// Remove js messages, if they exist.
		Joomla.removeMessages();

		$.ajax({
			type:"POST",
			url: 'index.php?option=com_content&task=article.shareDraft&format=json&' + sessionToken + '=1',
			data: share_draft,
			dataType: "json"
		})
		.done(function (response) {
			// Render messages, if any.
			if (response.success == true) {
				var shareLink = '<a href="' + response.data + '">' + response.data + '</a>';
				Joomla.renderMessages({info: [shareLink]});
				window.scrollTo(0, 0);
			}
		})
		.fail(function (xhr, ajaxOptions, thrownError) {
			alert("fail"),
			Joomla.renderMessages(xhr.responseText);
			window.scrollTo(0, 0);
		});
	}
});
