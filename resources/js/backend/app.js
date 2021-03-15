require('./bootstrap');
require('startbootstrap-sb-admin-2/js/sb-admin-2');
require('startbootstrap-sb-admin-2/vendor/chart.js/Chart');
require('startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle');
require('startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing');
require('bootstrap4-toggle');
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Swal from 'sweetalert2/src/sweetalert2'

$('.js-confirm-delete').click(function(e){
    e.preventDefault();

    Swal.fire({
        title: $(this).attr('data-trans-title'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: $(this).attr('data-trans-button-confirm'),
        cancelButtonText: $(this).attr('data-trans-button-cancel')
    }).then((result) => {
        if (result.value) {
            $(this).append('<form action="' + $(this).attr('href') + '" method="POST" class="hidden"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="' + $('meta[name=csrf-token]').attr('content') + '"></form>')
            $(this).find('form').submit();
        }
    })
})

$('.js-confirm-update').click(function(e){
    e.preventDefault();
    Swal.fire({
        title: $(this).attr('data-trans-title'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: $(this).attr('data-trans-button-confirm'),
        cancelButtonText: $(this).attr('data-trans-button-cancel')
    }).then((result) => {
        let data = JSON.parse($(this).attr('data-update'));
        if (result.value) {
            let html = '<form action="' + $(this).attr('href') + '" method="POST" class="hidden">' +
                '<input type="hidden" name="_method" value="' + $(this).attr('data-method') + '">' +
                '<input type="hidden" name="_token" value="' + $('meta[name=csrf-token]').attr('content') + '">';
            data.forEach(function (value) {
                html += '<input type="hidden" name="' + value.key + '" value="' + value.value + '">';
            });
            html += '</form>';
            $(this).append(html);
            $(this).find('form').submit();
        }
    })
})

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

