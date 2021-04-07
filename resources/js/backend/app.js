require('./bootstrap');
require('startbootstrap-sb-admin-2/js/sb-admin-2');
require('startbootstrap-sb-admin-2/vendor/chart.js/Chart');
require('startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle');
require('startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing');
require('bootstrap4-toggle');
require('dropzone');
require('./jscolor');
require('lightbox2/dist/js/lightbox.min');

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Swal from 'sweetalert2/src/sweetalert2'
// Auto add CSRF token to all ajax form submit
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/**
 * Ckeditor example
 *
 * import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
 * ClassicEditor.create( document.querySelector( '#editor' ));
 */

let contentText = document.querySelector( '#content-text' );
if (contentText) {
    ClassicEditor.create(contentText);
}

import swal from 'sweetalert2';
window.Swal = swal;

import $ from 'jquery';
window.jQuery = $;
window.$ = $;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/*
require('datatables.net-bs4');
const feather = require('feather-icons');
window.feather = feather;*/

/*
window.Dropzone = require('dropzone/dist/min/dropzone.min');
Dropzone.autoDiscover = false;
Dropzone.options.myAwesomeDropzone = {
    maxFiles: 10,
    thumbnailWidth: 50,
    thumbnailHeight: 50,
    maxFilesize: 20,
    init: function() {
        this.on("maxfilesexceeded", function(file){
            showSuccessMessage('No more files please. We allow only 10 files to be uploaded at the same time.');
            this.removeFile(file);
        });
    }
};
*/

$(function() {
    // Click on row as hyperlink
    $('tr[data-href]').click(function() {
        const href = $(this).data('href');
        if (href) {
            window.location.href = href;
        }
    });

    // Delete confirmation
    $(document).on('click', '[data-action="delete"]', function(e) {
        e.preventDefault();

        const href = $(e.currentTarget).attr('href');
        const callback = $(e.currentTarget).data('callback');
        const message = $(e.currentTarget).data('confirm');
        let success = $(e.currentTarget).data('success');
        if (!success) {
            success = 'Success.';
        }

        Swal.fire({
            title: 'Confirmation',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn-danger',
            }
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'DELETE',
                    url: href,
                    dataType: 'JSON',
                    success:function(data) {
                        if (data.code === 200) {
                            if (result.isConfirmed) {
                                if (result.isConfirmed) {
                                    Swal.fire(
                                        'Deleted!',
                                        success,
                                        'success'
                                    )
                                    setTimeout(function() {
                                        if (!callback) {
                                            window.location.reload();
                                        }
                                        else {
                                            window.location.href = callback;
                                        }
                                    }, 1500)
                                }
                            }
                        }
                    },
                    error: function(error) {
                    },
                });
            }
        });
    });

    // Apply autonumeric to input
    if ($('.money-input').length > 0) {
        new AutoNumeric('.money-input', {
            allowDecimalPadding: false,
            currencySymbol: "$",
            unformatOnSubmit: true,
        });
    }

    if ($('.integer-input').length > 0) {
        new AutoNumeric('.integer-input', {
            allowDecimalPadding: false,
            decimalPlaces: "0",
            currencySymbol: '',
            unformatOnSubmit: true,
        });
    }

    if ($('.decimal-input').length > 0) {
        new AutoNumeric('.decimal-input', {
            allowDecimalPadding: false,
            currencySymbol: '',
            unformatOnSubmit: true,
        });
    }

    $('form').submit(function() {
        console.log('form.submittion');
        var form = $(this);
        $(form).find('.integer-input, .decimal-input, .money-input').each(function(i) {
            var self = $(this);
            try {
                var val = self.val();
                if (val) {
                    val = val.replace(',', '').replace('$', '');
                }
                self.val(val);
            }
            catch(err) {
            }
        });
        return true;
    });
});

/**
 * Handle form error after submitting via AJAX
 */
window.handleAjaxFormValidationErrors = function(form, response) {
    if (response.status === 422) {
        if (response.responseJSON.message) {
            $(form).find('.show-errors').text(response.responseJSON.message).show();
        }

        if (response.responseJSON.errors) {
            for (var key in response.responseJSON.errors) {
                if (!response.responseJSON.errors.hasOwnProperty(key)) continue;

                const originalKey = key;

                if (key.includes('.')) {
                    var parts = key.split('.');
                    key = parts[0] + '[' + parts[1] + ']';
                }

                const field = $(form).find('[name="' + key + '"]');
                if (field.length > 0) {
                    field.addClass('is-invalid');
                    field.siblings('.invalid-feedback').text(response.responseJSON.errors[originalKey][0]).show();

                    // Select2
                    if (field.hasClass('select2-hidden-accessible')) {
                        field.next().find('.select2-selection').addClass('is-invalid');
                    }
                }
            }
        }
    }
};

/**
 * Show success message
 */
window.showSuccessMessage = function(message) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 10000
    });

    Toast.fire({
        icon: 'success',
        title: message
    });
};

/**
 * Show error message
 */
window.showErrorMessage = function(message) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 10000,
    });

    Toast.fire({
        icon: 'error',
        title: 'message'
    });
}

// Read a page's GET URL variables and return them as an associative array.
window.getUrlVar = function(param)
{
    var hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        if (hash[0] === param) {
            return hash[1];
        }
    }

    return '';
}

window.invertColor = function(hex) {
    const threshold = 130; /* about half of 256. Lower threshold equals more dark text on dark background  */

    const hRed = hexToR(hex);
    const hGreen = hexToG(hex);
    const hBlue = hexToB(hex);


    function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
    function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
    function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
    function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}

    const cBrightness = ((hRed * 299) + (hGreen * 587) + (hBlue * 114)) / 1000;
    if (cBrightness > threshold){return "#000000";} else { return "#ffffff";}
};

