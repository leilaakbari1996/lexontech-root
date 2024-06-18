const logout = $('.logout');
const Logout = function (e)
{
    e.preventDefault();
    const data = {
        _token:$('[name=_token]').val() ,
    }
    $.myAjax('/logout',data,callbackAuth,$.callbackErrorCreate,'POST')
}
logout.on('click',Logout);

const callbackAuth = function ()
{
    $.swal('موفقیت آمیز','برای ورود به سایت مجددا لاگین کنید.','success')
}
