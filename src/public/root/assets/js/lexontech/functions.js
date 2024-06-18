$.token = document.querySelector("[name=_token]").value;
$.myAjax = function(url,data=[],callback = false,callbackError=false,type='POST',swal)
{
    $.myLoading();
    $.ajax({
        type:type,
        url:url,
        dataType:'JSON',
        data:data,
        // contentType:false,
        // processData:false,
        success:function(response)
        {
            $('.my-loader').remove();
            if(!response.status){
                $.swal('error',response.message,'error',null,$.swalInfo);
            }else {
                callback(response.data);
            }
        },
        error:response => {
            $('.my-loader').remove();
            callbackError(response.responseJSON);
        },
    });
}

$.myLoading = function (){
    const div = '<div id="loader" class="d-flex my-loader">\n' +
        '    <img src="/root/assets/images/media/loader.svg" alt=""><br>\n' +
        '<div class="wait"><p>لطفا منتظر بمانید...</p></div>'+
        '</div>';
    $('body').append(div);

}

$.myFilePond = function (token,element)
{
    const pond = FilePond.create(element, {
        onaddfilestart: () => {
            $(".create").prop('disabled', 'disabled');
            $( '.create' ).each(function () {
                this.style.setProperty( 'cursor','no-drop', 'important' );
            });
        },

        onprocessfile: () => {
            $(".create").css('cursor','pointer')
            $(".create").prop('disabled', false);
        },

        server: {
            process: {
                url: '/file-pond-upload',
            },
            revert: '/file-pond-delete',
            headers : {
                'X-CSRF-TOKEN' : token
            },
        },
    });


}

$.myFilePondImport = function (token,element,url)
{
    const pond = FilePond.create(element);

    FilePond.setOptions({
        server: {
            process: '/'+url+'/import-save',
            revert: '/file-pond-delete',
            headers : {
                'X-CSRF-TOKEN' : token,
            },
        },
    });

}


$.requiredColumns = function (){
    let elementAccept = $('.create');
    let url = elementAccept.find('input').val();
    url += '/required-columns';
    const data = {
        _token : $.token
    };
    $.myAjax(url,data,$.callbackRequiredColumns);
};

$.callbackRequiredColumns = function(items)
{
    items = items['columns'];

    for (let i = 0; i < items.length; i++)
    {
        $('[name='+items[i]+']').parents(".my-input").find("label").addClass('label-required');
    }
}

$.callbackErrorCreate = function (items,columns)
{
    $.swal('error','لطفا فیلد ها را درست وارد کنید.','error',null,$.swalInfo)
    let error = items.errors;
    for(let i =0 ; i< columns.length ; i++)
    {
        $('[name='+columns[i]+']').parents(".my-input").find('.form-text').addClass('d-none');
        $('[name='+columns[i]+']').removeClass('required-column');
        $('[name='+columns[i]+']').parents(".my-input").find('.choices').removeClass('required-column');
    }
    $.each( error, function(key, value ) {
        $.messagesError(key,value);
    });
}

$.conventObjectToArray = function (error)
{
    return Object.keys(error).map(function (key) { return error[key]; });
}

$.messagesError = function (key,val){
    for(let i = 0 ;i<val.length ; i++)
    {
        var str2 = "required";
        if(val[i].indexOf(str2) != -1)
        {
            $('[name='+key+']').addClass('required-column');
            $('[name='+key+']').parents(".my-input").find('.choices').addClass('required-column');
            $('[name='+key+']').parents(".my-input").find('.select2').addClass('required-column');
            $('[name='+key+']').parents(".my-input").find('.form-text').addClass('form-text-password');
            $('[name='+key+']').parents(".my-input").find('.form-text').addClass('form-text-password');
        }
        $('[name='+key+']').parents(".my-input").find('.form-text').addClass('d-block');
        $('[name='+key+']').parents(".my-input").find('.form-text').removeClass('d-none');
    }
}

$.swalInfo = {
    confirmButtonText: 'متوجه شدم!',
    showCancelButton: false,
}
$.swal = function (title,text,icon,myAjax = null,swal = null,is_reload=true,reloadLocation = null)
{
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        allowOutsideClick: false,
        cancelButtonText:swal.cancelButtonText,
        confirmButtonText: swal.confirmButtonText,
        confirmButtonColor: swal.confirmButtonColor ?? "#3085d6",
        cancelButtonColor: swal.cancelButtonColor ?? "#d33",
        showCloseButton: true,
        showCancelButton: swal.showCancelButton,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed && reloadLocation != null &&  icon =='success') {
            window.location = reloadLocation;
        }
        if (result.isConfirmed &&  icon =='success' && is_reload) {
            location.reload()
        }
        else if (result.isConfirmed &&  icon =='success' && reloadLocation != null) {
            location.href = reloadLocation;
        }
        else if (result.isConfirmed &&  icon =='info') {
            $.myAjax(myAjax.url,myAjax.data,myAjax.callback,$.callbackErrorCreate,myAjax.type)
        }

    });
}

$.callbackMain = function (result){
    $.swal('موفقیت آمیز',result.message,'success',null,$.swalInfo)
}

$.CheckBoolean = function (val){
    if(val == true) return 1;
    else if(val == false) return 0;
}

$.CheckId = function (val)
{
    if (val == 0) return null;
    return val;
}

