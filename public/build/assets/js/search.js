$(document).ready(function () {
    // Fetch the CSRF token from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Setup CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    // Initialize Select2 with AJAX
    $('.studentSearch').select2({
        placeholder: 'قوتابییەک هەڵبژێرە',
            width: '100%', 
        allowClear: true,
        ajax: {
            url: '/api/search/student',
            type: 'POST', // Use POST method
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term // Search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 0 // Require at least one character to start searching
    });
    $('.teacherSearch').select2({
        placeholder: 'مامۆستایەک هەڵبژێرە',
        allowClear: true,
        ajax: {
            url: '/api/search/teacher',
            type: 'POST', // Use POST method
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term // Search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 0 // Require at least one character to start searching
    });
    $('.groupSearch').select2({
        placeholder: 'دەرسێک هەڵبژێرە',
        allowClear: true,
        ajax: {
            url: '/api/search/group',
            type: 'POST', // Use POST method
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term // Search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 0 // Require at least one character to start searching
    });

});
