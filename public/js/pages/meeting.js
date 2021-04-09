// select option

$.fn.select2.amd.define('select2/selectAllAdapter', [
    'select2/utils',
    'select2/dropdown',
    'select2/dropdown/attachBody'
], function (Utils, Dropdown, AttachBody) {

    function SelectAll() { }
    SelectAll.prototype.render = function (decorated) {
        var self = this,
            $rendered = decorated.call(this),
            $selectAll = $(
                '<button class="btn btn-xs btn-primary" type="button" style="margin-left:8px;"><i class="fa fa-check-square-o"></i> Chọn hết</button>'
            ),
            $unselectAll = $(
                '<button class="btn btn-xs btn-danger" type="button" style="margin-left:8px;"><i class="fa fa-square-o"></i> Hủy chọn</button>'
            ),
            $btnContainer = $('<div style="margin-top:3px;">').append($selectAll).append($unselectAll);
        if (!this.$element.prop("multiple")) {
            // this isn't a multi-select -> don't add the buttons!
            return $rendered;
        }
        $rendered.find('.select2-dropdown').prepend($btnContainer);
        $selectAll.on('click', function (e) {
            var $results = $rendered.find('.select2-results__option[aria-selected=false]');
            $results.each(function () {
                self.trigger('select', {
                    data: $(this).data('data')
                });
            });
            self.trigger('close');
        });
        $unselectAll.on('click', function (e) {
            var $results = $rendered.find('.select2-results__option[aria-selected=true]');
            $results.each(function () {
                self.trigger('unselect', {
                    data: $(this).data('data')
                });
            });
            self.trigger('close');
        });
        return $rendered;
    };

    return Utils.Decorate(
        Utils.Decorate(
            Dropdown,
            AttachBody
        ),
        SelectAll
    );

});

$('#parent_filter_select2').select2({
    placeholder: 'Select',
    dropdownAdapter: $.fn.select2.amd.require('select2/selectAllAdapter')
});

// create meeting
$('#btn-create-meeting-save').click(function() {
    $('#create-meeting-form').trigger('submit');
});

$('#create-meeting-form').submit(function(e) {
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
            $('#btn-create-meeting-save').attr('disabled', 'disabled');
            $('.show-errors, .invalid-feedback').hide();
            $('input.is-invalid, select.is-invalid,.select2-selection.is-invalid').removeClass('is-invalid');
        },

        success: function(response) {
            if (response.code === 200) {
                showSuccessMessage(response.message);
                $(form).trigger('reset');

                $('#createMeetingModal').modal('hide');

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
            $('#btn-create-meeting-save').removeAttr('disabled');
        }
    });
});
