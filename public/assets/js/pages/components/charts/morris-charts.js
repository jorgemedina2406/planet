function queryCharts(queryChart) {

    "use strict";

    // BAR CHART
    new Morris.Bar({
        element: 'kt_morris_3',
        data: queryChart,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Importaciones', 'Exportaciones'],
        barColors: ['#2abe81', '#24a5ff']
    });

}