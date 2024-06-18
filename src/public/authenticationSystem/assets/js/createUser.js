import('../../../root/assets/js/lexontech/functions.js')

const submit = $('.saveUser');

const save = function (e){
    e.preventDefault();
    const FullName        = $("[name=FullName]").val();
    const Type            = $('[name=Type]')[0].checked;
    let status            = $('[name=Status]')[0].checked;
    const lex_PhoneNumber = $('[name=lex_PhoneNumber]').val();
    const _token          = $('[name=_token]').val();
    const user_id         = $('[name=user_id]').val();
    let Status    = 0;
    if(status == true) {
        Status = 1;
    }
    let type    = 'author';
    if(Type == true) {
        type = 'admin';
    }

    let data = {
        lex_PhoneNumber    : lex_PhoneNumber          ,
        Status             : Status                   ,
        Type               : type                     ,
        _token             : _token                   ,
        FullName           : FullName                 ,
    }

    if (user_id == undefined)
    {
        $.myAjax('/panel/users',data,callbackUser,callbackErrorUserCreate,'POST')
    }
    else {
        $.myAjax('/panel/users/'+user_id,data,callbackUser,callbackErrorUserCreate,'PUT')
    }

}

submit.on('click',save);

const callbackErrorUserCreate = function (items) {
    $.callbackErrorCreate(items, columnsUser);
}
const callbackUser = function (result){
    $.swal('موفقیت آمیز',result.message,'success',null,$.swalInfo)
}

const columnsUser = [
    'lex_PhoneNumber'     ,
    'password'            ,
    'FullName'            ,
    'ProfileURL'          ,
    'Status'              ,
    'Type'                ,
];
