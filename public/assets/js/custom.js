'use strict';
//  Author: AdminDesigns.com
// 
//  This file is reserved for changes made by the use. 
//  Always seperate your work from the theme. It makes
//  modifications, and future theme updates much easier 
// 

jQuery(document).ready(function () {
    $('form').submit(function (e) {
        var form = $(this);

        if (form.hasClass('ajax')) {
            e.preventDefault();
            $.ajax({
                url: form.attr('action'),
                dataType: 'html',
                type: form[0].hasAttribute('data-method') ? form.data('method') : 'POST',
                data: form.serialize(),
                success: function (data, textStatus) {

                    if (form.hasClass('dialog')) {
                        $.magnificPopup.close();
                    }

                    sendNofification(form.data('notification-success-tile'), form.data('notification-success'), 'success');


                    window.location.reload();
                },
                error: function (xhr, er) {
                    var error = JSON.parse(xhr.responseText);

                    sendNofification(form.data('notification-error-tile'), xhr.status + ' - ' + error.message, 'error');
                }
            });
        }
    });
});


function _ajax_request(url, data, callback, type, method) {
    if (jQuery.isFunction(data)) {
        callback = data;
        data = {};
    }
    return jQuery.ajax({
        type: method,
        url: url,
        data: data,
        success: callback,
        dataType: type
    });
}

jQuery.extend({
    put: function (url, data, callback, type) {
        return _ajax_request(url, data, callback, type, 'PUT');
    },
    delete_: function (url, data, callback, type) {
        return _ajax_request(url, data, callback, type, 'DELETE');
    }
});

