@if ($resultData['data'])
	<div class="card p-0">
        <!-- /.card-header -->
		<div class="card-body">
			@include('filter-result', ['items' => $resultData['data']])
			<div class="result-search">
                <table class="table table-sm table-striped table-with-actions">
					<thead>
						<tr>

							@foreach ($resultData['columns'] as $column)
								@include('link-table-order', ['title' => $column['label'], 'field' => $column['field'], 'width' => $column['width'], 'align' => $column['align']])
							@endforeach

							@if ($resultData['actions'])
								<th colspan="100%">Ações</th>
							@endif

						</tr>
					</thead>
					<tbody>
						@foreach($resultData['data'] as $information)
							<tr>
								@foreach ($resultData['columns'] as $column)
									<td style="width:'{{ $column['width'] }}%'; text-align: '{{ $column['align'] }}';">{{ $information->{$column['field']} }}</td>
								@endforeach

								@if ($resultData['actions'])
									@foreach ($resultData['actions'] as $action)

										@php
										$href = explode('/', $action['href']);

										$href = array_map(function($x) use ($information){

											// Verifica se possui chaves
											if (preg_match('/{\w*}/', $x)) {

												$x = preg_replace('/[{}]/', '', $x);
												$x = $information->$x;

											}

											return $x;
										}, $href);

										$href = implode('/', $href);
										@endphp

										<td class="buttons">

											@if(isset($action['form']))
												{!! Form::open(['url' => $href, 'data-confirm' => $action['form']['data-confirm'], 'method' => $action['form']['method']]) !!}
													<button type="submit" class="{{ $action['class'] }}" title="{{ $action['title'] }}">
														<i class="{{ $action['icon'] }}"></i>
													</button>
												{!! Form::close() !!}
											@else
											<a href="{{ $href }}" class="{{ $action['class'] }}" title="{{ $action['title'] }}">
												<i class="{{ $action['icon'] }}"></i>
											</a>
											@endif

										</td>
									@endforeach
								@endif

							</tr>
						@endforeach

						@if ($resultData['data']->isEmpty())
							<tr>
								<td colspan="99" class="text-center">
									<em>Nenhum registro encontrado.</em>
								</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			<div class="result-filter2">
				@include('filter-result', ['items' => $resultData['data']])
            </div>
		</div>
		@include('pagination', ['items' => $resultData['data']])
	</div>
@endif
