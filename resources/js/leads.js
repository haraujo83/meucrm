$(document).ready(function() {
    let leads = {
        create: function () {
            $('#selecionar_colunas').on('click', this.clickSelecionarColunas);

            $('#items-1').sortable({
                group: 'list',
                animation: 200,
                ghostClass: 'ghost',
                onSort: reportActivity,
            });

            $('#items-2').sortable({
                group: 'list',
                animation: 200,
                ghostClass: 'ghost',
                onSort: reportActivity,
            });

            // Arrays of "data-id"
            $('#get-order').click(function() {
                var sort1 = $('#items-1').sortable('toArray');
                console.log(sort1);
                var sort2 = $('#items-2').sortable('toArray');
                console.log(sort2);
            });

            function reportActivity(CustomEvent) {
                console.log(CustomEvent);
            };
        },
        clickSelecionarColunas: function () {
            Swal.fire({
                title: '<strong>HTML <u>example</u></strong>',
                html:
                    'You can use <b>bold text</b>, ' +
                    '<a href="//sweetalert2.github.io">links</a> ' +
                    'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: 'Thumbs down'
            });
        }
    };
    leads.create();

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
