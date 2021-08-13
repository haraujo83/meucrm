@if ($resultData['data']->searchActive)
	<div class="result-search">

		@include('filter-result', ['items' => $resultData['data']])
		<table class="table table-sm table-striped table-with-actions">
			<thead>
				<tr>

					@foreach ($resultData['columns'] as $column)
						<th width="{{ $column['width'] ?? '' }}" align="{{ $column['align'] ?? '' }}">{{ $column['nome'] }}</th>
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
							<td width="{{ $column['width'] ?? '' }}" align="{{ $column['align'] ?? '' }}">{{ $information->{$column['campo']} }}</td>
						@endforeach

						@if ($resultData['actions'])
							@foreach ($resultData['actions'] as $action)

								<?php
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
								?>

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
							<em>Nenhuma registro encontrado.</em>
						</td>
					</tr>
				@endif
			</tbody>
		</table>
		@include('pagination', ['items' => $resultData['data']])

	</div>
@endif