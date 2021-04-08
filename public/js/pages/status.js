$('#btn-create-status-save').click(function() {
    $('#create-status-form').trigger('submit');
});

$('#create-status-form').submit(function(e) {
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
            $('#btn-create-save').attr('disabled', 'disabled');
            $('.show-errors, .invalid-feedback').hide();
            $('input.is-invalid, select.is-invalid,.select2-selection.is-invalid').removeClass('is-invalid');
        },

        success: function(response) {
            if (response.code === 200) {
                showSuccessMessage(response.message);
                $(form).trigger('reset');

                $('#createStatusModal').modal('hide');

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
            $('#btn-create-status-save').removeAttr('disabled');
        }
    });
});

// edit  category
$(document).on('click', '.edit-status', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        url: '/status/' + id + '/edit',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $('.name').val(response.data.name)
            $('.color').val(response.data.color)
            $('.description').val(response.data.description)
        }
    })
    $('#btn-update-status-save').click(function() {
        $('#update-status-form').trigger('submit');
    });

    $('#update-status-form').submit(function(e) {
        e.preventDefault();

        const form = $(this);
        $.ajax({
            url: '/status/' + id,
            type: 'PUT',
            dataType: 'json',
            data: form.serialize(),
            beforeSend: function() {
                $('#btn-create-save').attr('disabled', 'disabled');
                $('.show-errors, .invalid-feedback').hide();
                $('input.is-invalid, select.is-invalid,.select2-selection.is-invalid').removeClass('is-invalid');
            },

            success: function(response) {
                if (response.code === 200) {
                    showSuccessMessage(response.message);
                    $(form).trigger('reset');

                    $('#editStatusModal').modal('hide');

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
                $('#btn-update-status-save').removeAttr('disabled');
            }
        });
    });
})
