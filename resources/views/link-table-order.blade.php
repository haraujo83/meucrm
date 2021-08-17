@php
	$params = Request::all();
	$params = array_map('strval', $params);
	$params['page'] = null;

	$direction = 'asc';
	if (isset($params['_order']) && $params['_order'] === $field && $params['_direction'] === 'asc') {
		$direction = 'desc';
	}

	$params['_order'] = $field;
	$params['_direction'] = $direction;
	$params = http_build_query($params);
	$params = Request::url() . "?{$params}";
@endphp

<a href="{{ $params }}">
	{{ $title }}
	<i class="fas fa-xs fa-arrow-up" style="color: {{ $direction === 'asc' ? 'black' : 'grey' }};"></i>
    <i class="fas fa-xs fa-arrow-down" style="color:{{ $direction === 'desc' ? 'black': 'grey' }};"></i>
</a>
