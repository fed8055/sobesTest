$(document).ready(function(){
    $('#login_submit').click(function (e) {
        e.preventDefault();
        var login = document.getElementById('login').value;
        var password = document.getElementById('password').value;
        $.ajax({
            type:'post',
            url:'user/login',
            dataType:'json',
            data:{
                login:login,
                password:password
            },
            error: function (e) {
                console.log(e);
            }
        }).done(function (msg) {
            console.log(msg);
            if (msg['success'] == true){
                popUpHide('#auth');
                location.reload();/////////////https://www.phpied.com/files/location-location/location-location.html
            }else if(msg['success'] == false){
                $('#error').html('ОШИБКА!');
            }
        })
    });

    $('#register_submit').click(function (e) {
        e.preventDefault();
        var login = document.getElementById('login').value;
        var password = document.getElementById('password').value;
        $.ajax({
            type:'post',
            url:'user/login',
            data:{login:login,
                password:password},
        }).done(function (msg) {
            alert(msg);
            if (msg === true){
                popUpHide('#auth');
                location.reload();/////////////https://www.phpied.com/files/location-location/location-location.html
            }else if(msg === false){
                $('#error').html('ОШИБКА!');
            }
        })
    });

    $('#logout').click(function (e) {
        $.ajax({
            url:'user/logout',
        }).done(function () {
            location.reload();/////////////https://www.phpied.com/files/location-location/location-location.html
        })
    })
});
