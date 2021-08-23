$(document).ready(function() {
    $.fn.select2.defaults.set("theme", "bootstrap");
    $.fn.select2.defaults.set("language", "pt-BR");

    app = {
        err: function (err) {
            Swal.fire({
                icon: 'error',
                text: err,
            });
        }
    };

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

    $('[data-date_range]').daterangepicker({
        format: 'L',
        locale: daterangepickerPtBr,
        opens: 'right',
        drops: 'up'
    });

    $('[data-mask="cpf"]').inputmask('999.999.999-99');

    $('[data-mask="telefone"]').inputmask("(9{2})9{8}9{0,1}");
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
