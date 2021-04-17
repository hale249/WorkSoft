$('.js-example-basic-multiple').select2();
// create meeting
$('#btn-create-job-save').click(function() {
    $('#create-job-form').trigger('submit');
});

$('#create-job-form').submit(function(e) {
    e.preventDefault();

    const action = $(this).attr('action');
    const method = $(this).attr('method');
    const form = $(this);

    $.ajax({
        method: method,
        url: action,
        dataType: 'json',
        data: form.serialize(),
        beforeSend: function() {
            $('#btn-create-job-save').attr('disabled', 'disabled');
            $('.show-errors, .invalid-feedback').hide();
            $('input.is-invalid, select.is-invalid,.select2-selection.is-invalid').removeClass('is-invalid');
        },

        success: function(response) {
            if (response.code === 200) {
                showSuccessMessage(response.message);
                $(form).trigger('reset');

                $('#createJobModal').modal('hide');

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
            $('#btn-create-job-save').removeAttr('disabled');
        }
    });
});


$('#btn-update-job-save').click(function() {
    $('#update-job-form').trigger('submit');
});

$('#update-job-form').submit(function(e) {
    e.preventDefault();

    const form = $(this);
    $.ajax({
        url: '/jobs/' + id,
        type: 'PUT',
        dataType: 'json',
        data: form.serialize(),
        beforeSend: function() {
            $('#btn-job-save').attr('disabled', 'disabled');
            $('.show-errors, .invalid-feedback').hide();
            $('input.is-invalid, select.is-invalid,.select2-selection.is-invalid').removeClass('is-invalid');
        },

        success: function(response) {
            if (response.code === 200) {
                showSuccessMessage(response.message);
                $(form).trigger('reset');

                $('#editJobModal').modal('hide');

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
            $('#btn-update-job-save').removeAttr('disabled');
        }
    });
});
