const elementActionDelete              = $('[kind="delete"]');
const urlDelete                        = $("[name=urlDelete]").val();
const valueDeleteFa                    = $("[name=valueDeleteFa]").val();
const Delete = function (e)
{
    e.preventDefault();
    const item_id                     = $(this).parent().find('input[name=item_id]').val();
    let data = {
        _token:$('[name=_token]').val() ,
    };
    let myAjax = {
        'url' : '/'+urlDelete+'/'+item_id,
        'data' : data,
        'callback' : callback,
        'type':"DELETE",
    }
    let swal = {
        'confirmButtonText': 'بله',
        'cancelButtonText':'خیر',
        'showCloseButton': true,
        'showCancelButton': true,
    }
    $.swal('','آیا مطمنید می خواهید '+valueDeleteFa+' را حذف کنید؟','info',myAjax,swal);

}
elementActionDelete.on("click", Delete);

const callback = function ()
{
    let swal = {
        'confirmButtonText': 'متوجه شدم!',
        'cancelButtonText':'خیر',
        'showCancelButton': false,
    }
    $.swal('success',''+valueDeleteFa+' با موفقیت حذف شد.','success',null,swal);
}
