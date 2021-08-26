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
            Swal.fire({
                html: html,
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
                ghostClass: 'ghost'
            });
        });
    }
};

$(document).ready(function() 
{
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
        {
            value = pagination;
        }

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
    var urlForm = 'http://' + $('[name=hostname]').val() + '/' +  $('[name=module]').val() + '/validationSearch';

    $.ajax({
        url: urlForm,
        method: method,
        data: form,
        dataType: 'JSON',
        success: function(data) {
            $('.result-index').html('');
        },
        error: function(data) {
            console.log(data);
        }
    }).done(function(data) {
        $('.result-index').html(data);
    });
}

function searchOrder(param){

    var form = $('.form-search'),
		method  = form.attr('method');

    var form = param;

    searchAjax(method, form);
}