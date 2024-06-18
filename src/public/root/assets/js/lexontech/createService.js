const submit = $('.saveService');

const save = function (e){
    e.preventDefault();
    const Title         = $("[name=Title]").val();
    const Type          = $('[name=Type]').val();
    const status        = $('[name=Status]')[0].checked;
    const Text          = $('#blog-content .ql-editor').html();
    const _token        = $('[name=_token]').val();
    const service_id    = $('[name=service_id]').val();
    const Link          = $('[name=Link]').val();
    const Order         = $('[name=Order]').val();
    let Status   = 0;
    if(status == true) {
        Status = 1;
    }

    let data = {
        Title       : Title         ,
        Type        : Type          ,
        Status      : Status        ,
        _token      : _token        ,
        Text        : Text          ,
        Link        : Link          ,
    }
    if (Order != '')
    {
        data.Order = parseInt(Order);
    }

    if (service_id == undefined)
    {
        $.myAjax('/panel/services',data,callbackService,callbackErrorServiceCreate,'POST')
    }
    else {
        $.myAjax('/panel/services/'+service_id,data,callbackService,callbackErrorServiceCreate,'PUT')
    }

}

submit.on('click',save);

const callbackService = function (result){
    $.swal('موفقیت آمیز',result.message,'success',null,$.swalInfo)
}

const callbackErrorServiceCreate = function (items) {
    $.callbackErrorCreate(items, columnsService);
}
const columnsService = [
    'Title'      ,
    'Type'       ,
    'LogoURL'    ,
    'Link'       ,
    'Text'       ,
    'Status'     ,
    'Order'      ,
];

