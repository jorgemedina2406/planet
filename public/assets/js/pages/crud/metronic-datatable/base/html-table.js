"use strict";
// Class definition

var KTDatatableHtmlTableDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {

        var datatable = $('.kt-datatable').KTDatatable({

            sortable: true,

            data: {
                saveState: { cookie: false },
                serverSorting: true,
            },
            search: {
                input: $('#generalSearch'),
            },
            columns: [{
                field: 'reference',
                title: 'Referencia',
                sortable: 'asc',
                width: 80
            }, {
                field: 'courier',
                title: 'Courier',
                width: 60
            }, {
                field: 'dateNotification',
                title: 'Fecha de Notificacion',
                type: 'date',
                format: 'MM/DD/YYYY',
            }, {
                field: 'mawb',
                title: 'Mawbaaa',
                width: 60
            }, {
                field: 'hawb',
                title: 'Hawb',
                width: 30,
            }, {
                field: 'line',
                title: 'Linea Aerea',
                width: 50,
            }, {
                field: 'flight',
                title: 'Nro de Vuelo',
                width: 70
            }, {
                field: 'exporter',
                title: 'Exportador',
            }, {
                field: 'status_id',
                title: 'Estatus',
                width: 80,
                // callback function support for column rendering
                template: function(row) {
                    var estatus = {
                        1: { 'title': 'Nueva', 'class': ' kt-badge--info' },
                        2: { 'title': 'En Proceso', 'class': 'kt-badge--warning' },
                        3: { 'title': 'Terminada', 'class': 'kt-badge--success' },
                        4: { 'title': 'Cancelada', 'class': 'kt-badge--danger' }
                    };

                    return '<button data-record-id="' + row.id + '" class="kt-badge ' + estatus[row.status_id].class + ' kt-badge--inline kt-badge--pill btn btn-sm btn-default btn-font-sm"><i class="la la-edit"></i> ' + estatus[row.status_id].title + '</button>';
                },
            }],
        });

        $('#kt_form_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_form_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_form_status,#kt_form_type').selectpicker();

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableHtmlTableDemo.init();
});