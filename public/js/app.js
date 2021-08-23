let app = {
    create: function () {
        $('#select-result-cols').on('click', this.clickSelectResultCols);
    },
    success: function (msg) {
        Swal.fire({
            icon: 'success',
            text: msg,
        });
    },
    err: function (err) {
        Swal.fire({
            icon: 'error',
            text: err,
        });
    },
    clickSelectResultCols: function (e) {
        let api = '/fieldsSearch/moduleResultColumnsIndex';
        let data = {
            module: $(e.currentTarget).data('module')
        }

        $.get(api, data)
        .then(function (html) {
            let $html = $(html);
            Swal.fire({
                html: $html,
                width: 600,
                customClass: {
                    popup: 'swal-custom1-popup',
                    content: 'swal-custom1-content',
                    htmlContainer: 'swal-custom1-html-container'
                },
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: '<i class="fa fa-save"></i> Gravar',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    let api = '/api/fieldsSearch/moduleResultColumnsSave';
                    let data = $('#form_fields_search_result_columns').serialize();

                    return $.post(api, data)
                    .catch(function (xhr) {
                        Swal.showValidationMessage(xhr.responseJSON.message);
                    });
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    app.success(result.value.msg);
                }
            });

            $('.sortable').sortable({
                group: 'list',
                animation: 200,
                ghostClass: 'ghost',
                onUpdate: function () {
                    app.sortableEqualizeHeights();
                },
                onChange: function () {
                    app.sortableEqualizeHeights();
                }
            });

            app.sortableEqualizeHeights();
        });
    },
    sortableEqualizeHeights: function () {
        let $colLeft = $('.sortable:eq(0)');
        let $colRight = $('.sortable:eq(1)');

        let col1h = parseInt($colLeft.css('height'));
        let col2h = parseInt($colRight.css('height'));

        if (col1h > col2h) {
            $colRight.css('height', col1h+'px');
        } else if (col1h < col2h) {
            $colLeft.css('height', col2h+'px');
        }
    }
};

$(document).ready(function() {
    $.fn.select2.defaults.set("theme", "bootstrap");
    $.fn.select2.defaults.set("language", "pt-BR");

    app.create();

    const daterangepickerPtBr = {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "Para",
        "customRangeLabel": "Personalizar",
        "weekLabel": "W",
        "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sab"
        ],
        "monthNames": [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
        "firstDay": 1
    };

    $('.data-select2').select2();

    tippy('[data-tippy-content]');

    Waves.attach('.btn')
    Waves.init();

    $('[data-date_range]').daterangepicker({
        format: 'L',
        locale: daterangepickerPtBr,
        opens: 'right',
        drops: 'up'
    });

    $('[data-mask="cpf"]').inputmask('999.999.999-99');

    $('[data-mask="telefone"]').inputmask("(9{2})9{8}9{0,1}");
});
