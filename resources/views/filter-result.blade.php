@if (!$items->isEmpty())
	<div class="result-filter">
		<div class="form-group row">
			<div class="col-sm-8">
				<?php
				$firstItemPage = (($items->currentPage() - 1) * $items->perPage()) + 1;
				$lastItemPage = $items->currentPage() * $items->perPage();
				$count = $items->total() > $lastItemPage ? $lastItemPage : $items->total();
				?>
				<label>MOSTRANDO DE {{ $firstItemPage }} ATÉ {{ $count }} DE {{ $items->total() }} REGISTROS</label>
			</div>
			<div class="col-sm-3 text-right">
				<label>RESULTADOS POR PÁGINA</label>
			</div>
			<div class="col-sm-1">
				{{ Form::select('count-record-page', ['20' => 20, '50' => 50, '100' => 100, '500' => 500], $items->perPage(), ['placeholder' => 'Selecione...']) }}
			</div>
		</div>
	</div>
@endif
