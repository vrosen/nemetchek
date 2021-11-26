
window.onload = function () {

    $(".item_done").click(function(){

        let itemId = $(this).data("id");
        let done = $(this).is(":checked") ? 1:0;
        let changeItemStatusUrl = $('#changeItemStatusUrl').val();
        let changeItemStatusUrlCurrent = changeItemStatusUrl.slice(0, -1) + itemId;

        $.ajax({
            url: changeItemStatusUrlCurrent,
            method: 'GET',
            data: {
                id: itemId,
                done: done
            },
            dataType: 'json',
            success: function(data) {
                if(data.responseMessage == 'success'){
                    $('.alert-success').show();
                }
            }
        })

    });

    $('#updateAlert').on('closed.bs.alert', function () {
        window.location.reload();
    })
}