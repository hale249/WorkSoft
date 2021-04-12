$('#btn-create-category-save').click(function() {
    $('#create-category-form').trigger('submit');
});

$('#create-category-form').submit(function(e) {
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

                $('#createCategoryModal').modal('hide');

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
            $('#btn-create-category-save').removeAttr('disabled');
        }
    });
});

// edit  category
$(document).on('click', '.edit-category', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        url: '/category/' + id + '/edit',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $('.name').val(response.data.name)
            $('.description').val(response.data.description)
        }
    })
    $('#btn-update-category-save').click(function() {
        $('#update-category-form').trigger('submit');
    });

    $('#update-category-form').submit(function(e) {
        e.preventDefault();

        const form = $(this);
        $.ajax({
            url: '/category/' + id,
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

                    $('#editAttributeModal').modal('hide');

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
                $('#btn-update-category-save').removeAttr('disabled');
            }
        });
    });
})
