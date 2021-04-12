$('#btn-finish-job-save').click(function(e) {
    e.preventDefault();
    $('#finish-job-form').trigger('submit');
});

$('#finish-job-form').submit(function(e) {
    e.preventDefault();

    const form = $(this);
    const action = $(this).attr('action');
    $.ajax({
        url: action,
        type: 'PUT',
        dataType: 'json',
        data: form.serialize(),
        beforeSend: function() {
            $('#btn-finish-job-save').attr('disabled', 'disabled');
            $('.show-errors, .invalid-feedback').hide();
            $('input.is-invalid, select.is-invalid,.select2-selection.is-invalid').removeClass('is-invalid');
        },

        success: function(response) {
            if (response.code === 200) {
                showSuccessMessage(response.message);
                $(form).trigger('reset');
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            }
            else if (response.message) {
                $(form).find('.show-errors').text(response.message).show();
            }
        },

        error: function(error) {
            handleAjaxFormValidationErrors(form, error);
        },
        complete: function() {
            $('#btn-finish-job-save').removeAttr('disabled');
        }
    });
});
