$.requiredColumns();
const elementAccept = $('[kind="accept"]');
const elementWebsiteID = $('[name="website_id"]');
const Submit = function (e) {
    e.preventDefault();
    let IsRejected     = $("[name=IsRejected]")[0].checked;
    let IsPaid         = $("[name=IsPaid]")[0].checked;
    const BaseAmount     = $("[name=BaseAmount]").val();
    const website_id     = $("[name=website_id]").val();
    const customer_id    = $("[name=customer_id]").val();
    const coupon_id      = $("[name=coupon_id]").val();
    IsPaid               = $.CheckBoolean(IsPaid);
    IsRejected           = $.CheckBoolean(IsRejected);


    let data = {
        BaseAmount     : BaseAmount,
        IsRejected     : IsRejected,
        IsPaid         : IsPaid,
        website_id     :website_id,
        coupon_id      :coupon_id,
        customer_id    :customer_id,
        _token         : $('[name=_token]').val(),
    };

    let url                     = $(this).parents('form').attr('url');
    let method                  = 'POST';

    $.myAjax(url, data, callback, callbackErrorCreate,method);
};

const ChangeWebsite    = function (e)
{
    e.preventDefault();
    const website_id   = $("[name=website_id]").val();
    let data = {
        _token:$('[name=_token]').val() ,
    };
    let url = '/websites/'+website_id+'/customers-and-coupons';
    $.myAjax(url,data,callbackFindMarketers);

}

elementAccept.on("click", Submit);
elementWebsiteID.on("change", ChangeWebsite);

const columns = [
    'website_id'           ,
    'Tax'                  ,
    'BaseAmount'           ,
    'IsRejected'           ,
    'IsPaid'               ,
    'customer_id'          ,
    'coupon_id'            ,
    'marketer_id'
];


const callbackErrorCreate = function (items) {
    $.callbackErrorCreate(items, columns);
}

const callback = function () {
    $.swal('success', 'سفارش با موفقیت ثبت شد.', 'success',null,$.swalInfo);
}

const callbackFindMarketers = function (items)
{
    const item = items.customers;
    $('#customer_website').empty();
    let newOption = new Option('انتخاب کنید...', 0, false, false);
    $('#customer_website').append(newOption).trigger('change');
    for (let i = 0; i < item.length; i++) {
        let newOption = new Option(item[i].Phone+'('+item[i].Name+')', item[i].id, false, false);
        $('#customer_website').append(newOption).trigger('change');
    }

    items = items.coupons;
    $('#coupons_website').empty();
    let Option1 = new Option('انتخاب کنید...', 0, false, false);
    $('#coupons_website').append(Option1).trigger('change');
    for (let i = 0; i < items.length; i++) {
        let Option1 = new Option(items[i].Name+'('+items[i].Value+' % )', items[i].id, false, false);
        $('#coupons_website').append(Option1).trigger('change');
    }
}
