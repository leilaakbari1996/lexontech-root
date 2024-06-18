const submit = $('.saveMenu');

const save = function (e){
    e.preventDefault();
    const Title          = $("[name=Title]").val();
    const Type           = $('[name=Type]').val();
    const status         = $('[name=Status]')[0].checked;
    const _token         = $.token;
    const menu_id        = $('[name=menu_id]').val();
    let parent_id        = $('[name=parent_id]').val();
    const Link           = $('[name=Link]').val();
    let Order          = $('[name=Order]').val();
    let Status   = 0;
    if(status == true) {
        Status = 1;
    }
    let data        = {
        Title               : Title         ,
        Type                : Type          ,
        Status              : Status        ,
        _token              : _token        ,
        Link                : Link          ,
    }
    if (Order != '')
    {
        Order                 = parseInt(Order);
        data.Order = Order;
    }

    if (parent_id != "")
    {
        data.parent_id           = parseInt(parent_id)   ;
    }


    if (menu_id == undefined)
    {
        $.myAjax('/panel/menus',data,callbackMenu,callbackErrorMenuCreate,'POST')
    }
    else {
        $.myAjax('/panel/menus/'+menu_id,data,callbackMenu,callbackErrorMenuCreate,'PUT')
    }

}

submit.on('click',save);

const callbackMenu = function (result){
    $.swal('موفقیت آمیز',result.message,'success',null,$.swalInfo)
}

const callbackErrorMenuCreate = function (items) {
    $.callbackErrorCreate(items, columnsMenu);
}
const columnsMenu = [
    'Title'        ,
    'Link'         ,
    'parent_id'    ,
    'IconURL'      ,
    'Type'         ,
    'Status'       ,
    'Order'        ,
];

