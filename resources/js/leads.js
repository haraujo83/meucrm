$(document).ready(function() {
    $('#account').select2({
        ajax: {
            url: '/api/listAccountsAjax',
            dataType: 'json',
            delay: 250,
            minimumInputLength: 3,
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
