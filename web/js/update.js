setTimeout('ajax_update()', 10000);

function ajax_update()
{
    $.ajax({url: "index.php/update", context: $(".extra_extra_news #needslist"), success: function(data) {
        $(this).empty();
        $(this).prepend(data);
    }});

    setTimeout('ajax_update()', 10000);
}