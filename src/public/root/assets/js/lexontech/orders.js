const chart = function ()
{
    let items = $('[name=items]').val();
    items = JSON.parse(items);

    let customers = items.customers;
    let orders    = items.orders;
    let discount    = items.discount;


    let columns_name_customers = [];
    let value_customers = [];
    for (let i = 0;i<customers.length;i++)
    {
        columns_name_customers[i] = customers[i].startDate;
        value_customers[i] = customers[i].amount;
    }
    $.myChartLex(columns_name_customers,value_customers,'#columns-distributed');

    let columns_name_orders = [];
    let columns_name_discount = [];
    let value_orders = [];
    let value_discount = [];
    for (let i = 0;i<orders.length;i++)
    {
        columns_name_orders[i] = orders[i].startDate;
        value_orders[i] = orders[i].amount;
    }
    $.myChartLex(columns_name_orders,value_orders,'#columns-distributed-income-website');

    for (let i = 0;i<discount.length;i++)
    {
        columns_name_discount[i] = discount[i].startDate;
        value_discount[i] = discount[i].amount;
    }
    $.myChartLex(columns_name_discount,value_orders,'#area-spline',value_discount);

}
chart();
