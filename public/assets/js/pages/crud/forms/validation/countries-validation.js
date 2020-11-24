// Class definition

var KTFormControls = function() {
    // Private functions

    var countries = function() {
        $("#kt_form_1").validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                code: {
                    required: true
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
            countries();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});