//require('./bootstrap');

let app = {
    create: function () {
        $.fn.select2.defaults.set("theme", "bootstrap");
        $.fn.select2.defaults.set("language", "pt-BR");

        $(document).on('click', '[data-action="modal_cancelar"]', function (e) {
            e.preventDefault();

            $.magnificPopup.instance.close();
        });

        $(document).on('click', '[data-action="modal_gravar"]', function (e) {
            e.preventDefault();

            let api = '/api/fieldsSearch/moduleResultColumnsSave';
            let data = $('#form_fields_search_result_columns').serialize();

            $.post(api, data)
            .then(function (r) {
                app.success(r.msg);
                $.magnificPopup.instance.close();
            })
            .catch(function (xhr) {
                app.err(xhr.responseJSON.message);
            });
        });

        $('#select-result-cols').magnificPopup({
            type: 'ajax',
            callbacks: {
                ajaxContentAdded: function () {
                    $('.sortable').sortable({
                        group: 'list',
                        animation: 200,
                        chosenClass: 'chosen',
                        ghostClass: 'ghost',
                        onChoose: function (/**Event*/e) {
                            app.sortableEqualizeHeights(e);
                        },
                        onUnchoose: function (/**Event*/e) {
                            app.sortableEqualizeHeights(e);
                        },
                        onStart: function (/**Event*/e) {
                            //app.sortableEqualizeHeights(e);
                        },
                        onEnd: function (/**Event*/e) {
                            //app.sortableEqualizeHeights(e);
                        },
                        onAdd: function (/**Event*/e) {
                            //app.sortableEqualizeHeights(e);
                        },
                        onUpdate: function (/**Event*/e) {
                            //app.sortableEqualizeHeights(e);
                        },
                        onRemove: function (/**Event*/e) {
                            //app.sortableEqualizeHeights(e);
                        },
                        onMove: function (/**Event*/e) {
                            //app.sortableEqualizeHeights(e);
                        },
                        onSort: function (/**Event*/e) {
                            //app.sortableEqualizeHeights(e);
                        }
                    });

                    app.sortableEqualizeHeights();
                }
            }
        });

        //$('#select-result-cols').on('click', this.clickSelectResultCols);

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
    sortableEqualizeHeights: function (e) {
        let $colLeft = $('.sortable:eq(0)');
        let $colRight = $('.sortable:eq(1)');

        let col1h = parseInt($colLeft.height());
        let col2h = parseInt($colRight.height());

        if (e === undefined) {
            if (col1h > col2h) {
                $colRight.css('height', col1h+'px');
            } else if (col1h < col2h) {
                $colLeft.css('height', col2h+'px');
            }
        } else {
            if (e.type === 'choose') {// diminuiu col1. igualar col2
                if (col1h < col2h) {// se 1 e menor, igualar a 2
                    $colLeft.css('height', col2h + 'px');
                } else if (col1h > col2h) {// se 1 e maior, igualar a 1
                    $colRight.css('height', col1h + 'px');
                }
            }

            if (e.type === 'unchoose') {// diminuiu col2. igualar col1
                if (col2h < col1h) {// se 2 e menor, igualar a 1
                    $colRight.css('height', col1h + 'px');
                } else if (col2h > col1h) {// se 2 e maior, igualar a 2
                    $colLeft.css('height', col2h + 'px');
                }
            }
        }
    }
};

$(document).ready(function() {
    app.create();
});

// Reload no resultado para exibir a quantidade requerida de itens
$(document).on('change', '[name="count-record-page"]', function(e) {
    $('[name="pagination"]').val(this.value);
    $('.form-search').submit();
});

/**
 * Verifica se a variável indicativa de busca existe
 *
 * @return bool
 */
function getSearchActive() {
    if (typeof ActiveSearch == 'undefined') {
        return false;
    }

    return true;
}

// Se a busca estiver ativa, rola p/ baixo
var buscando = getSearchActive();
if (buscando) {
    $("html, body").animate({
        'scrollTop' : $(document).height()
    }, 500);
}

/*$(document).on('click', '[type="submit"]', function(e) {

    var ths        = event.target,
        formulario = $(ths).closest('.form-search'),
		url        = formulario.attr('action');

    // Inibe a ação natural do navegador
    e.preventDefault();

    $.ajax({
        url: url,
        method: 'GET',
        data: formulario,
        success: function(data) {
            //console.log(data);
            //$('.result-index').html();
            //$('.result-index').html(data);
        },
    }).done(function(data) {
        // Exibe o retorno da requisição
        /*swal({
            'title': 'Teste',
            'text': 'erro',
            'icon': 'error',
        });*/
/*$('.result-index').html('');
});
});*/
