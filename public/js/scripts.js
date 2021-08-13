/**
 * Verifica se a variável indicativa de busca existe
 *
 * @return bool
 */
function getBuscaAtiva() {
	if (typeof buscaAtiva == 'undefined') {
		return false;
	}

	return true;
}

/**
 * Adiciona status aos campos
 *
 * @return void
 */
function inputStatus(status, elemento){
	classes = status ? 'fa fa-check text-success' : 'fa fa-times text-danger';
	elemento.after('<i class="status-icon ' + classes + '" style="position: absolute; right: -2px; top: 8px;"></i>');
	elemento.next('.status-icon').delay(2000).fadeOut(500).delay(500).queue(function() { $(this).remove(); });
}

/**
 * Confere e Exibe a mensagem de retorno do formulário AJAX
 *
 * @param  Object resposta
 * @return void
 */
function trataRespostaFormularioAjax(resposta) {
	// Nenhuma mensagem presente na resposta
	if (typeof resposta.sucesso == 'undefined' || typeof resposta.mensagem == 'undefined') {
		return;
	}

	// Limpa possíveis erros exibidos
	$('.error-block[data-campo]').empty();

	// Há campos com erros?
	if (typeof resposta.erros != 'undefined') {

		// Passa por cada mensagem de erro
		for (var campo in resposta.erros) {

			// if (campo.indexOf('.') != -1) {
			// 	nomeCampo = campo.split('.')[0];
			// 	console.log(nomeCampo);
			// 	$('.error-block[data-campo="' +nomeCampo+ '.*"]').clone().prop('name', campo);
			// }

			// Somente a primeira mensagem, se houver mais de uma
			var msg = typeof resposta.erros[campo] == 'string'
				? resposta.erros[campo]
				: resposta.erros[campo][0];

			if ($('.error-block[data-campo="' +campo+ '"]').length > 0) {
				$('.error-block[data-campo="' +campo+ '"]').html(msg);
			}
			// Em caso de inputs dinâmicas
			else {
				var nomeCampo = normalizaNomeInputArray(campo);

				alertClass = '';
				if($('.container-area').find('[name="' +nomeCampo+ '"]').length > 0) {
					alertClass = 'alert alert-danger';
				}

				// Criando o span p/ msg de erro
				$('[name="' +nomeCampo+ '"]').parent().append(
					'<span data-campo="' +campo+ '" class="help-block error-block ' + alertClass + '">'
						+msg+
					'</span>'
				);
			}
		}
	}

	// Exibe a mensagem de retorno na parte superior da tela
	exibeMensagemTemporaria(resposta.mensagem, resposta.sucesso ? 'sucesso' : 'erro');
}

/**
 * Exibe a mensagem de retorno do formulário AJAX
 *
 * @param  string mensagem
 * @param  string classe
 * @return void
 */
function exibeMensagemTemporaria(mensagem, classe, excecaoPermanente) {
	var box = $('#mensagem-temporaria'),
		mgLeft = 0;

	// Já há uma mensagem sendo exibida
	if (typeof box.get(0).timeoutId != 'undefined') {
		box.stop();
		clearTimeout(box.get(0).timeoutId);
	}

	box
		.removeAttr('style')
		.attr('class', classe)
		.html(mensagem);

	// Calculando a margin p/ deixar a mensagem centralizada
	box.attr('style', 'margin-left:' +(box.width() / -2)+ 'px');

	// Seta o efeito de fading out
	if (typeof excecaoPermanente == 'undefined' || !excecaoPermanente) {
		box.get(0).timeoutId = setTimeout(function() {
			$('#mensagem-temporaria').stop().fadeOut(300);
		}, 3000);
	}
}

/**
 * Faz uma requisição AJAX p/ salvar os dados do formulario
 *
 * @param  Event event
 * @return void
 */
function salvaDadosCampoAjax(event, ignorarSalvar) {
	event.preventDefault();

	var timeout    = 0,
		ths        = event.target,
		formulario = $(ths).closest('.formulario-ajax'),
		url        = formulario.attr('action');

	// Se o evento deve ser ignorado (p/ quando for ativado pelo trigger)
	if (ignorarSalvar) {
		return;
	}

	// Aplicar algum delay?
	if (typeof event.data != 'undefined' && typeof event.data.delay != 'undefined') {
		timeout = event.data.delay;
	}

	// Verifica se está sendo usado o evento keyup e a tecla pressionada é inválido
	if (typeof event.data != 'undefined' && typeof event.data.keyup != 'undefined' && isKeyCodeInvalid(event.keyCode)) {
		return;
	}

	// Aplicando possível delay
	setTimeout(function(ths, formulario, url) {

		// Recolhe os dados
		var data = formulario.serializeArray(),
		formData = new FormData();

		// Há requisição em andamento
		if (typeof event.target.ajaxId != 'undefined') {
			event.target.ajaxId.abort();
		}

		// Aviso de que a requisição está sendo processada
		exibeMensagemTemporaria(
			'Processando...',
			'status',
			true
		);

		// Concatenando campos p/ enviar
		for (var campo in data) {

			if (!$('[name="' + data[campo].name + '"]').hasClass('elemento-nao-gravar-dinamico')) {

				if($(ths).closest('.btn-add-multiList').length == 1 && (!$('[name="' + data[campo].name + '"]').hasClass('elemento-nao-editar-dinamico') || $('[name="' + data[campo].name + '"]').closest('.row-multiList').find(ths).length > 0)
				|| ($(ths).closest('.btn-add-multiList').length == 0 && !$('[name="' + data[campo].name + '"]').hasClass('elemento-nao-editar-dinamico'))) {
					formData.append(data[campo].name, data[campo].value);
				}
			}
		}

		// Concatena arquivos, se houver
		if ($(formulario).find('[type="file"]').length > 0) {
			$(formulario).find('[type="file"]').each(function() {
				if (this.files.length > 0) {
					// Só o primeiro arquivo
					var arquivo = this.files[0];

					formData.append($(this).attr('name'), arquivo);
				}
			});
		}

		// Faz a requisição AJAX
		event.target.ajaxId = $.ajax({
			'url':      url,
			'type':     'POST',
			'data':     formData,
			'processData': false,
			'contentType': false,
			'dataType': 'JSON',
			// Trata o sucesso
			'success':  function(resposta, textStatus) {
				trataRespostaFormularioAjax(resposta);

				// Limpa campos
				if (resposta.sucesso) {
					// Limpa campos sigilosos depois de salvos
					formulario.find('input[type="password"]').val('');

					// Limpa campos de arquivos
					limpaInputFilesFormulario(formulario);
				}

				// Verifica se é necessário atualizar a página
				if ((typeof resposta.atualizar != 'undefined' && resposta.atualizar) || $(ths).hasClass('reload')) {
					toggleLoading();

					window.location.reload();
				}
				if ($(ths).parents('.btn-add-multiList') || $(ths).hasClass('btn-add-multiList')) {
					elemento = $(ths).hasClass('btn-add-multiList') ? $(ths) : $(ths).parents('.btn-add-multiList');
					addMultiList(elemento);
				}

				// Refaz a view com os novos dados e div que podem ou não aparecer
				// reloadPageAjax();
			},
			// E também o erro
			'error': function(jqXHR, textStatus, errorThrown) {
				if (typeof jqXHR.responseJSON != 'undefined' && typeof jqXHR.responseJSON.mensagem != 'undefined') {
					trataRespostaFormularioAjax(jqXHR.responseJSON);
				}
			}
		});
	}, timeout, ths, formulario, url);
}

/**
 * Transforma o nome de uma input (de array) com pontos para colchetes
 *
 * @param  string nomeInput
 * @return string
 */
function normalizaNomeInputArray(nomeInput) {
	if (nomeInput.indexOf('.') == -1) {
		return nomeInput;
	}

	// Quebra em partes
	nomeInput = nomeInput.split('.');

	// Unifica no formato certo e retorna
	return nomeInput.shift() +'['+ nomeInput.join('][') +']';
}

/**
 * Atualiza o valor do select2 criado, de acordo com o select original
 *
 * @return void
 */
function atualizaSelect2(elemento) {
	// Se for uma cadeia de elementos
	if ($(elemento).length > 1) {
		$(elemento).each(function() {
			atualizaSelect2(this);
		});
	}

	// Confere o tipo do elemento
	if (!$(elemento).is('select')) {
		return;
	}

	// Remove o plugin e o aciona novamente
	try {
		$(elemento).select2('destroy');
	}
	catch(e) {}
	finally {
		$(elemento).select2();
	}
}

/**
 * Atualiza o valor dos campos que utilizam o plugin maskMoney
 *
 * @param object elemento
 * @param string valor
 * @param int precision
 * @return void
 */
function setValueMaskMoney(elemento, valor, precision){
	valor = valor.toString().replace('.', ',');
	elemento.val(valor).focus().blur();
}

// Se a busca estiver ativa, rola p/ baixo
var buscando = getBuscaAtiva();
if (buscando) {
    $("html, body").animate({
        'scrollTop' : $(document).height()
    }, 500);
}
