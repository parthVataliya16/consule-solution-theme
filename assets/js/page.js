$(document).ready(function() {
    $(".spinner-section").hide();
    $("#viewAllBlogs").click(() => {
    $(".spinner-section").show();
        $.ajax ({
            url: ajax_object.url,
            method: 'POST',
            data: {
                action: 'view_all_blogs'
            },
            success: function (result) {
                $(".spinner-section").hide();
                $(".row.listing").append(result);
                $("#viewAllBlogs").hide();
            }
        })
    })
})