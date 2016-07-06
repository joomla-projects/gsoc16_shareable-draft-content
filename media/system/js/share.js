jQuery(document).ready(function(e){e("#sharebutton").click(function()
{
    var a={
            articleId  : $('jform_id').val(),
            title: $('jform_title').val(),
            sharetoken  : $().val(),
    Joomla.removeMessages(),

        e.ajax
        (
            {
                method:"POST",
                url:document.getElementById("sharebutton").getAttribute("data-ajaxuri"),
                data:a,
                dataType:"json"
            }
        )
            .fail(
                function(e,a,m)
                {
                    Joomla.renderMessages(Joomla.ajaxErrorsMessages(e,a,m)),
                        window.scrollTo(0,0)
                }
            )
            .done
            (function(e){"object"==typeof e.messages&&null!==e.messages&&(Joomla.renderMessages(e.messages),window.scrollTo(0,0))

            })
    })
});

