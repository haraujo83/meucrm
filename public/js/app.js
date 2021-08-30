let app = {
    daterangepickerPtBr: {
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
    },
    magnificPopupConfig: {
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
    },
    init: function () {
        $('.data-select2').select2();

        tippy('[data-tippy-content]');

        Waves.attach('.btn')
        Waves.init();

        $('[data-date_range]').daterangepicker({
            format: 'L',
            locale: this.daterangepickerPtBr,
            opens: 'right',
            drops: 'up'
        });

        $('[data-mask="cpf"]').inputmask('999.999.999-99');

        $('[data-mask="telefone"]').inputmask("(9{2})9{8}9{0,1}");
    },
    create: function () {
        $.fn.select2.defaults.set("theme", "bootstrap");
        $.fn.select2.defaults.set("language", "pt-BR");

        this.init();

        let $d = $(document);

        $d.on('click', '[data-action="modal_cancelar"]', this.modalCancelar);

        $d.on('click', '[data-action="modal_gravar"]', this.modalGravar);

        $('#select-result-cols').magnificPopup(this.magnificPopupConfig);

        //$('#select-result-cols').on('click', this.clickSelectResultCols);
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
    modalGravar: function (e) {
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
    },
    modalCancelar: function (e) {
        e.preventDefault();

        $.magnificPopup.instance.close();
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

$(document).on('change', '[name=count-record-page]', function(e)
{

    var form = $('.form-search'),
		method     = form.attr('method');

    var form = $('.form-search').serialize();

    //seta quantidade de registros por pagina
    var pagination = this.value;
    var parts = form.split('&');
    var partsUrl = '';
    parts.forEach(function (part)
    {
        var keyValue = part.split('=');
        var key = keyValue[0];
        var value = keyValue[1];

        if(key == 'pagination')
            value = pagination;

        partsUrl += '&'+key+'='+value;
    });

    form = partsUrl;

    // Inibe a ação natural do navegador
    e.preventDefault();
    searchAjax(method, form);
});

$(document).on('click', '.form-search [type="submit"]', function(e)
{

    var form = $('.form-search'),
		method     = form.attr('method');

    var form = $('.form-search').serialize();

    // Inibe a ação natural do navegador
    e.preventDefault();
    searchAjax(method, form);
});

$(document).on('click', '.page-link', function(e)
{

    var form = $('.form-search'),
		method     = form.attr('method');

    var linkPagination  = $(this).prop('href');
    var form = linkPagination.split('?')[1];

    // Inibe a ação natural do navegador
    e.preventDefault();
    searchAjax(method, form);
});

function searchAjax(method, form)
{
    var urlForm = 'http://' + $('[name=hostname]').val() + '/' +  $('[name=module]').val() + '/result';

    $.ajax({
        url: urlForm,
        method: method,
        data: form,
        success: function(data) {
            limpaResultado();
        },
        error: function(data) {
            limpaResultado();

            //mostra os novos erros
            error = data.responseJSON.errors;
            $.each(error, function(key, value) {
                $('[name="'+key+'"]').addClass('is-invalid');
                $('#validation-'+key+'-error').html(value);
            });
        }
    }).done(function(data) {
        $('.result-index').html(data);
    });
}

function searchOrder(param)
{
    var form = $('.form-search'),
		method  = form.attr('method');

    var form = param;

    searchAjax(method, form);
}

function limpaResultado()
{
    //limpa os erros
    limparErros();
    //caso de erro não mostra o resultado
    $('.result-index').html('');
}

function limparCampos()
{
    $('input, select').val('');
    limparErros();
}

function limparErros()
{
    // Limpa possíveis erros exibidos
    $('input, select').removeClass('is-invalid');
}

$(document).on('click', '.form-create [type="submit"], .form-edit [type="submit"]', function(e)
{

    var form = $('.form-search'),
		method     = form.attr('method');

    var form = $('.form-search').serialize();

    // Inibe a ação natural do navegador
    e.preventDefault();
    createOrEditAjax(method, form);
});

function createOrEditAjax(method, form)
{
    var urlForm = 'http://' + $('[name=hostname]').val() + '/' +  $('[name=module]').val();

    $.ajax({
        url: urlForm,
        method: method,
        data: form,
        success: function(data) {
            
        },
        error: function(data) {
            limparErros();

            //mostra os novos erros
            error = data.responseJSON.errors;
            $.each(error, function(key, value) {
                $('[name="'+key+'"]').addClass('is-invalid');
                $('#validation-'+key+'-error').html(value);
            });
        }
    }).done(function(data) {
        
    });
}
