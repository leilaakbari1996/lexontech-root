const deleteCategory = $('.delete');
const deleteElement = function ()
{
    const id          = $(this).find('input[name=id]').val();
    let url           = $(this).find('[name=urlDelete]').val();
    const text        = $(this).find('[name=textDelete]').val();
    const urlDefault  = $(this).find('[name=urlDefault]').val();
    const title = ' ';
    const icon  = 'info';
    const swalInfo        = {
        cancelButtonText:'خیر حذف نکن!!',
        confirmButtonText: 'بله حذف کن!!',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonColor: "#09AD95",
        cancelButtonColor: "#d33",
    }
    const myAjax  = {
        url : '/panel/'+url+'/'+id,
        data: {
            urlDefault: urlDefault,
            _token    : $.token,
        },
        callback : callbackDelete,
        type : 'DELETE',
    }
    $.swal(title,text,icon,myAjax,swalInfo)

}

deleteCategory.on('click',deleteElement);

const callbackDelete = function (result){
    $.swal('موفقیت آمیز',result.message,'success',null,$.swalInfo,false,'/panel/'+result.url)
}
