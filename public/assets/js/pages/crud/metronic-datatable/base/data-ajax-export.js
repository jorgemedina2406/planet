"use strict";

// Class definition

var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var route = $('#ajax_data').data('route');
        var app_url = $("meta[name='url']").attr("content");
        var userAuth = $("meta[name='userAuth']").attr("content");
        var route_edit = app_url + '/administracion/editar-exportacion';
        var route_view = app_url + '/administracion/exportacion';
        var route_delete = app_url + '/administracion/delete-export';
        var route_pdf = app_url + '/administracion/report-export-pdf';

        var datatable = $('.kt-datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: route,
                        "token": $("meta[name='_token']").attr("content"),
                        // sample custom headers
                        // headers: { 'x-my-custom-header': 'some value', 'x-test-header': 'the value' },
                        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
                saveState: {
                    cookie: true,
                    webstorage: true,
                }
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: [{
                field: 'reference',
                title: 'Referencia',
                width: 90,
                sortable: 'asc',
            }, {
                field: 'courier',
                title: 'Courier',
                width: 60,
                sortable: false,
            }, {
                field: 'dateNotification',
                title: 'Fecha de Notificacion',
                type: 'date',
                width: 60,
                format: 'MM/DD/YYYY',
                sortable: false,
            }, {
                field: 'mawb',
                title: 'Mawb',
                width: 60,
                sortable: false,
            }, {
                field: 'hawb',
                title: 'Hawb',
                width: 60,
                sortable: false,
            }, {
                field: 'line',
                title: 'Linea Aerea',
                sortable: false,
                width: 80,
            }, {
                field: 'flight',
                title: 'Nro de Vuelo',
                width: 70,
                sortable: false,
            }, {
                field: 'exporter',
                title: 'Exportador',
                sortable: false,
            }, {
                field: 'status_id',
                title: 'Estatus',
                sortable: false,
                width: 100,
                // callback function support for column rendering
                template: function(row) {
                    var estatus = {
                        1: { 'title': 'Nueva', 'class': ' kt-badge--info' },
                        2: { 'title': 'En Proceso', 'class': 'kt-badge--warning' },
                        3: { 'title': 'Terminada', 'class': 'kt-badge--success' },
                        4: { 'title': 'Cancelada', 'class': 'kt-badge--danger' },
                        5: { 'title': 'Revalidado y previo', 'class': 'kt-badge--primary' },
                        6: { 'title': 'Despacho', 'class': 'kt-badge--info' },
                        7: { 'title': 'Rojo', 'class': 'kt-badge--danger' },
                        8: { 'title': 'Verde', 'class': 'kt-badge--success' },
                        9: { 'title': 'Entregado', 'class': 'kt-badge--success' },
                    };

                    return '<button data-record-id="' + row.id + '" class="kt-badge ' + estatus[row.status_id].class + ' kt-badge--inline kt-badge--pill btn btn-sm btn-default btn-font-sm"><i class="la la-edit"></i> ' + estatus[row.status_id].title + '</button>';
                },
            }, {
                field: 'Actions',
                title: 'Acciones',
                sortable: false,
                width: 105,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    var button_delete = '';

                    if (userAuth === 'Administrador') {

                        button_delete = '\
						<button data-route="' + route_delete + '/' + row.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-sm delete" id="kt_sweetalert_demo_9" title="Eliminar">\
							<i class="flaticon2-trash"></i>\
						</button>';
                    }

                    return '\
						<a href="' + route_view + '/' + row.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Ver">\
							<i class="la la-eye"></i>\
						</a>\
						<a href="' + route_edit + '/' + row.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Editar">\
							<i class="flaticon2-paper"></i>\
						</a>' + button_delete;
                },
            }],

            translate: {
                records: {
                    processing: 'Cargando...',
                    noRecords: 'No se encontrarón archivos',
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: 'Primero',
                                prev: 'Anterior',
                                next: 'Siguiente',
                                last: 'Último',
                                more: 'Más páginas',
                                input: 'Número de página',
                                select: 'Seleccionar tamaño de página',
                            },
                            info: 'Mostrando {{start}} - {{end}} de {{total}} registros',
                        },
                    },
                },
            },

        });

        $('#kt_form_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'status_id');
        });

        $('#kt_form_exporter').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'exporter');
        });

        $('#lineSearch').keyup(function() {
            datatable.search($(this).val().toLowerCase(), 'line');
        });

        $('#dateSearchButton').click(function() {
            datatable.search($('#dateSearch').val().toLowerCase(), 'dateNotification');
        });

        $('#kt_form_status,#kt_form_type').selectpicker();

        datatable.on('click', '[data-record-id]', function(e) {
            modalSubRemoteDatatable($(this).data('record-id'), datatable);
            $('#kt_modal_sub_KTDatatable_remote').modal('show');
        });

        datatable.on('click', '#kt_sweetalert_demo_9', function(e) {
            var href = $(this).data('route');
            swal.fire({
                title: 'Esta seguro?',
                text: "Esta a punto de eliminar el registro!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, eliminarlo!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: href,
                        type: 'get'
                    }).done(function() {
                        swal.fire(
                            'Eliminado!',
                            'El registro se ha eliminado.',
                            'success'
                        );
                        datatable.reload();
                    });
                } else if (result.dismiss === 'cancel') {
                    swal.fire(
                        'Cancelado',
                        'El registro no se elimino',
                        'error'
                    )
                }
            });
        });

    };

    var modalSubRemoteDatatable = function(id, datatable) {
        $('#kt_form_status_change').on('change', function() {

            $('#observation').removeClass('d-none');

        });

        $('#changeStatus').on('click', function() {

            status = $('#kt_form_status_change').val();
            var observation = $('#observationInfo').val();

            var href = $(this).data('route');

            $.ajax({
                url: href + '?export=' + id + '&status_id=' + status + '&observation=' + observation,
                "token": $("meta[name='_token']").attr("content"),
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                type: 'post'
            }).done(function() {
                $('#observationInfo').val('');
                $('#kt_modal_sub_KTDatatable_remote').modal('hide');
                datatable.reload();
                var content = {};
                var message = 'Estatus actualizado';
                content.message = message;
                content.title = 'Exito';
                content.icon = 'icon la la-check-circle-o';
                var notify = $.notify(content, {
                    type: 'success',
                    showProgressbar: true,
                    spacing: 10,
                    timer: 2000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    delay: 1000,
                    z_index: 10000,
                    animate: {
                        enter: 'animated bounceIn',
                        exit: 'animated bounceIn'
                    }
                });
                // location.reload();
            });

        });

    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});