const chart = function ()
{
    let columns_name = [];
    let value_BaseAmount = [];
    let value_TotalAmount = [];
    let items = $('[name=items]').val();
    if(items != undefined)
    {
        items = JSON.parse(items);

        let chartBaseAmount = items.chartBaseAmount;
        let chartTotalAmount    = items.chartTotalAmount;

        for (let i = 0;i<chartBaseAmount.length;i++)
        {
            columns_name[i] = chartBaseAmount[i].startDate;
            value_BaseAmount[i] = chartBaseAmount[i].amount;
        }

        for (let i = 0;i<chartTotalAmount.length;i++)
        {
            value_TotalAmount[i] = chartTotalAmount[i].amount;
        }

        $.myChartLex(columns_name,value_BaseAmount,'#general-diagram-of-sale-and-income',value_TotalAmount);
    }

    let yourItems = $('[name=myItems]').val();
    if(yourItems != undefined)
    {
        items = JSON.parse(yourItems);

        let chartBaseAmount     = items.chartBaseAmount;
        let chartTotalAmount    = items.chartTotalAmount;


        columns_name = [];
        value_BaseAmount = [];
        value_TotalAmount = [];
        for (let i = 0;i<chartBaseAmount.length;i++)
        {
            columns_name[i] = chartBaseAmount[i].startDate;
            value_BaseAmount[i] = chartBaseAmount[i].amount;
        }

        for (let i = 0;i<chartTotalAmount.length;i++)
        {
            value_TotalAmount[i] = chartTotalAmount[i].amount;
        }

        $.myChartLex(columns_name,value_BaseAmount,'#general-diagram-of-your-sale-and-income',value_TotalAmount);
    }

}
chart();
