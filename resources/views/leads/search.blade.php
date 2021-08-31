<div class="row">
    {{ Form::bsText('first_name', 'Nome:', $filters['first_name'] ?? null) }}

    {{ Form::bsCpf('cpf', 'CPF:', $filters['cpf'] ?? null) }}

    {{ Form::bsPhone('phone_mobile', 'Telefone:', $filters['phone_mobile'] ?? null) }}

    {{ Form::bsEmail('email', 'E-mail:', $filters['email'] ?? null) }}

    {{ Form::bsSelect2('parent_type', 'Produto:', $filters['parent_type'] ?? null, $productList) }}

    {{ Form::bsSelect2('status', 'Status:', $filters['status'] ?? null, $statusLeadList) }}

    {{ Form::bsSelect2('assigned_user_id', 'Atribuído a:', $filters['phone_mobile'] ?? null, $usersList) }}

    {{ Form::bsSelect2('rating', 'Rating:', $filters['rating'] ?? null, $ratingList) }}

    {{ Form::bsSelect2('account_id', 'Conta:', $filters['account_id'] ?? null, [], ['data-placeholder' => 'Digite o nome da conta...', 'data-list_account']) }}

    {{ Form::bsSelect2('lead_source', 'Fonte do Lead:', $filters['lead_source'] ?? null, $leadSourceDom) }}

    {{ Form::bsSelect2('status_imovel', 'Status do Imóvel:', $filters['status_imovel'] ?? null, $statusImovelList) }}

    {{ Form::bsSelect2('tem_imovel', 'Tem Imóvel:', $filters['tem_imovel'] ?? null, $temImovelList) }}

    {{ Form::bsDateRange('periodo_criacao', 'Período de Criação:', $filters['periodo_criacao'] ?? null) }}
</div>
