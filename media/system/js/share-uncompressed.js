/**
 * @package         Joomla.JavaScript
 * @copyright       Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Calls the sending process of the config class
 */
jQuery(document).ready(function ($)
{
    $('#sharebutton').click(function ()
    {
        var share_draft = {
            articleId  : $().val(),
            title: $('jform_title').val(),
            sharetoken  : $().val(),

        };

        // Remove js messages, if they exist.
        Joomla.removeMessages();

        $.ajax({
                url: 'index.php?option=com_content&task=article.shareDraft',
                data: share_draft,
                dataType: "json"
            })
            .done(function (response) {
                // Render messages, if any.
                if (typeof response.messages == 'object' && response.messages !== null)
                {
                    Joomla.renderMessages(response.messages);

                    window.scrollTo(0, 0);
                }

    });
});

