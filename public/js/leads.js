
let leads = {
    select2Defaults: {
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
        }
    },
    select2ListAccountSet: function () {
        let accountSel2Config = {
            ajax: {
                url: '/api/listAccounts',
                dataType: 'json',
                delay: 250,
                minimumInputLength: 3,
                transport: this.select2Defaults.transport,
                processResults: this.select2Defaults.processResults,
                cache: false
            }
        };
        $('[data-list_account].select2').select2(accountSel2Config);
    },
    select2ListDevelopmentSet: function () {
        let developmentSel2Config = {
            ajax: {
                url: '/api/listDevelopments',
                dataType: 'json',
                delay: 250,
                minimumInputLength: 3,
                transport: this.select2Defaults.transport,
                processResults: this.select2Defaults.processResults,
                cache: false
            }
        };
        $('[data-list_empreendimento].select2').select2(developmentSel2Config);
    },

    construct: function () {
        this.select2ListAccountSet();

        this.select2ListDevelopmentSet();

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

            if (v === '') {
                $('[data-parent_type]').hide();
            } else {
                $('[data-parent_type]:not([data-parent_type='+v+'])').hide();
                $('[data-parent_type='+v+']').show();
            }

        }
    }
};

$(document).ready(function() {
    leads.construct();
});
