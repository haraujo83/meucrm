@php
	$params = Request::all();
	$params = array_map('strval', $params);
	$params['page'] = null;

	$activeDesc = 'inactiveOrder';
	$activeAsc = 'inactiveOrder';
	$direction = '';
	if (isset($params['_order']) && $params['_order'] == $field){
		if($params['_direction'] == 'asc') {
			$direction = 'desc';
			$activeDesc = 'activeOrder';
		}else{
			$direction = 'asc';
			$activeAsc = 'activeOrder';
		}
	}

	$params['_order'] = $field;
	$params['_direction'] = $direction;
	$params = http_build_query($params);
@endphp
<th style="width: {{ $width }}%; text-align: {{ $align }};">
	{{ $title }}
	<i onclick="searchOrder('{{ $params }}')" class="fas fa-xs fa-arrow-up {{ $activeAsc }}"></i>
	<i onclick="searchOrder('{{ $params }}')" class="fas fa-xs fa-arrow-down {{ $activeDesc }}"></i>
</th>
