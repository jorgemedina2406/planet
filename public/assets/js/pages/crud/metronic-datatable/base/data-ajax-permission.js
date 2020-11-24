"use strict";

// Class definition

var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var route = $('#ajax_data').data('route');
        var app_url = $("meta[name='url']").attr("content");
        var userAuth = $("meta[name='userAuth']").attr("content");
        var route_edit = app_url + '/administracion/catalogos/editar-permiso';
        var route_view = app_url + '/administracion/catalogos/permiso';
        var route_delete = app_url + '/administracion/catalogos/delete-permission';

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
                serverPaging: false,
                serverFiltering: false,
                serverSorting: true,
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
                field: 'name',
                title: 'Nombre',
                sortable: 'asc',
            }, {
                field: 'Actions',
                title: 'Acciones',
                sortable: false,
                width: 110,
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