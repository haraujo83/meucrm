
let leads = {
    construct: function () {
        let accountSel2Config = {
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
        };

        $('#account_id.select2').select2(accountSel2Config);

        this.create.construct();
    },
    create: {
        construct: function () {
            if ($('.form-store').length) {
                $('#parent_type').on('change', this.parentTypeChange)
            }
        },
        parentTypeChange: function (e) {
            let $el = $(e.currentTarget);
            let v = $el.val();

            $('[data-parent_type]:not([data-parent_type='+v+'])').hide();
            $('[data-parent_type='+v+']').show();
        }
    }
};

$(document).ready(function() {
    leads.construct();
});
