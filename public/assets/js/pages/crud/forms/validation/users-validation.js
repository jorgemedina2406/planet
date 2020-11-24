// Class definition

var KTFormControls = function() {
    // Private functions

    var users = function() {
        $("#kt_form_1").validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                country: {
                    required: true,
                },
                state: {
                    required: true,
                },
                city: {
                    required: true,
                },
                street: {
                    required: true,
                },
                colony: {
                    required: true,
                },
                municipality: {
                    required: true,
                },
                consignee: {
                    required: true,
                },
                entity_federal: {
                    required: true,
                },
                nro_ext: {
                    required: true,
                },
                nro_int: {
                    required: true,
                },
                postal: {
                    required: true,
                },
                password: {
                    required: true
                },
                role: {
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
                form.submit(); // submit the form
            }
        });
    }

    return {
        // public functions
        init: function() {
            users();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});