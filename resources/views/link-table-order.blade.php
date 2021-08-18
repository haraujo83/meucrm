@php
	$params = Request::all();
	$params = array_map('strval', $params);
	$params['page'] = null;

	$activeDesc = 'inactive';
	$activeAsc = 'inactive';
	$direction = '';
	if (isset($params['_order']) && $params['_order'] == $field){
		if($params['_direction'] == 'asc') {
			$direction = 'desc';
			$activeDesc = 'active';
		}else{
			$direction = 'asc';
			$activeAsc = 'active';
		}
	}

	$params['_order'] = $field;
	$params['_direction'] = $direction;
	$params = http_build_query($params);
	$params = Request::url() . "?{$params}";
@endphp
<th style="width: {{ $width }}%; text-align: {{ $align }};">
	<a href="{{ $params }}">
		{{ $title }}
		<i class="fas fa-xs fa-arrow-up {{ $activeAsc }}"></i>
		<i class="fas fa-xs fa-arrow-down {{ $activeDesc }}"></i>
	</a>
</th>
