$(document).ready(function() {
    $('#account').select2({
        ajax: {
            url: '/api/listAccountsAjax',
            dataType: 'json',
            delay: 250,
            minimumInputLength: 3,
            transport: function (params, success) {
                if (typeof params.data.term === 'string' && params.data.term.length >= params.minimumInputLength) {
                    const $request = $.getJSON(params);

                    $request.then(success);

                    $request.fail(function (xhr) {
                        app.err(xhr.responseJSON.message);
                    });

                    return $request;
                }
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (v, i) {
                        return {
                            text: v,
                            id: i
                        }
                    })
                };
            },
            cache: false
        }
    });
});
