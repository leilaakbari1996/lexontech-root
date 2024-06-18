const chart = function ()
{
    let items = $('[name=items]').val();
    items = JSON.parse(items);
    let users    = items.user;
    let columns_name = [];
    let value = [];
    for (let i = 0;i<users.length;i++)
    {
        columns_name[i] = users[i].startDate;
        value[i] = users[i].amount;
    }

    $.myChartLex(columns_name,value,'#columns-distributed-user');



}
chart();
