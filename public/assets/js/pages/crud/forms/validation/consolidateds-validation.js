// Class definition

var KTFormControls = function() {
    // Private functions

    var imports = function() {
        $("#kt_form_1").validate({
            // define validation rules
            rules: {
                des: {
                    required: true,
                },
                courier_id: {
                    required: true,
                },
                hawbs: {
                    required: true,
                },
                date_notification: {
                    required: true,
                },
                guie: {
                    required: true,
                },
                hawbs_delivered: {
                    required: true,
                },
                hawns_planet: {
                    required: true,
                }
            },

            errorPlacement: function(error, element) {
                var group = element.closest('.input-group');
                if (group.length) {
                    group.after(error.addClass('invalid-feedback'));
                } else {
                    element.after(error.addClass('invalid-feedback'));
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt-hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function(form) {
                var href = $(this).data('route');
                swal.fire({
                    title: 'Esta seguro?',
                    text: "Esta a punto de guardar el registro!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, guardarlo!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {

                        swal.fire(
                            'Guardado!',
                            'El registro se ha guardado.',
                            'success'
                        );
                        form.submit(); // submit the form

                    } else if (result.dismiss === 'cancel') {
                        swal.fire(
                            'Cancelado',
                            'El registro no se guardo',
                            'error'
                        )
                    }
                });
            }
        });
    }

    return {
        // public functions
        init: function() {
            imports();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});