// Class definition

var KTFormControls = function() {
    // Private functions

    var exporters = function() {
        console.log('aaa');
        $("#kt_form_1").validate({
            // define validation rules
            rules: {
                name: {
                    required: true
                },
                postal: {
                    required: true
                },
                country_id: {
                    required: true
                },
                email: {
                    required: false
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
            exporters();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});