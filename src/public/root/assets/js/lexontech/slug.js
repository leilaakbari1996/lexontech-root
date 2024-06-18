import('../lexontech/functions.js')
const element  = $('[name="Title"]');

const generateSlug = function (e){
    const title = element.val();
    const model = $('[name=Model]').val();
    let data = {
        Title   : title                   ,
        Model   : model                   ,
        _token  : $('[name=_token]').val(),
    }
    $.myAjax('/panel/categories/generate-slug',data,callback,$.callbackErrorCreate,'POST');
}
element.on("change", generateSlug);
const callback = function (result)
{
    $('[name="Slug"]').val(result.slug);
}
