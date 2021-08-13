@if (!$items->isEmpty())
	<div class="result-filter">
		<div class="form-group row">
			<div class="col-sm-8">
				<?php
				$firstItemPage = (($items->currentPage() - 1) * $items->perPage()) + 1;
				$lastItemPage = $items->currentPage() * $items->perPage();
				$count = $items->total() > $lastItemPage ? $lastItemPage : $items->total();
				?>
				<label class="col-form-label">Mostrando de {{ $firstItemPage }} até {{ $count }} de {{ $items->total() }} registros</label>
			</div>
			<div class="col-sm-3 text-right">
				<label class="col-form-label">Resultados por Página</label>
			</div>
			<div class="col-sm-1">
				{{ Form::select('count-record-page', ['20' => 20, '50' => 50, '100' => 100, '500' => 500], $items->perPage(), ['class' => 'form-control form-control-sm']) }}
			</div>
		</div>
	</div>
@endif
