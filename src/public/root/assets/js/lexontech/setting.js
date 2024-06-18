
const submit = $('.saveSetting');

const save = function (e){
    e.preventDefault();
    const title = $('[name = title]').val();
    const link = $('[name = link]').val();
    const video = $('[name = video]').val();
    const text = $('#blog-content .ql-editor').html();
    const setting_id = $('[name = setting_id]').val();
    const _token   = $.token;
    let data         = {
        title     : title,
        text      : text,
        link      : link,
        _token    : _token,
        video     : video,
    }

    $.myAjax('/panel/settings/'+setting_id,data,callbackSetting,$.callbackErrorCreate,'PUT')




}

submit.on('click',save);

const callbackSetting = function (result){
    $.swal('موفقیت آمیز',result.message,'success',null,$.swalInfo)
}
