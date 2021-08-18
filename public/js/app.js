$(document).ready(function() {
    const select2Params = {
        language: "pt-BR",
        theme: "bootstrap"
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

    $('.data-select2').select2(select2Params);

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
