/*function clickOrder(elem) {
        if($(elem).val() === 'asc'){
            $(elem).val('desc');
            $(elem).html('По убыванию');
            pagination();
        }else if($(elem).val() === 'desc'){
            $(elem).val('asc');
            $(elem).html('По возрастанию');
            pagination();
        }
}

function pagination() {
    var val;
    if ($('#order').val()) {
        val = $('#order').val()
    } else {
        val = 'asc';
         //$('#test').html('<button id="order" onclick="clickOrder(this)" value="asc">По возрастанию</button>');
    }
    $.ajax({
        type: 'post',
        url: 'paginationController/',
        dataType:'html',
        data: {
            table: 'content',
            fields: 'id, content',
            order: val,
            pageNum: page,
        },
        success: function (html) {
            //$('#test').html(html);

            $("#output").html(msg);
        }
    });
}*/
