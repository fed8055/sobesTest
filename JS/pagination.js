$(document).ready(function () {
    $('#order').click(function (e) {//СМЕНА СОРТИРОВКИ
        if(this.value === 'asc'){
            this.value = 'desc';
            this.innerHTML = 'По убыванию';
            pagination();
        }else if(this.value === 'desc'){
            this.value = 'asc';
            this.innerHTML ='По возрастанию';
            pagination();
        }
    });
});


function pagination(page) {
    var val;
    if (document.getElementById('#order')) {
        val = document.getElementById('#order').value;
    } else {
        val = 'asc';
        document.getElementById("#orderDiv").html('<button id="order" value="asc">По возрастанию</button>');//ДАЁБАНЫЙВРОТСУКАНАХУЙБЛЯТЬ
    }
    $.ajax({
        type: 'post',
        url: 'paginationController/',
        data: {
            table: 'content',
            fields: 'id, content',
            order: val,
            postPerPage: 5,
            pageNum: page,
        },
        success: function (msg) {
            $("#output").html(msg);
        }
    });
}
