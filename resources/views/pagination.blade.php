@if (!empty(Request::all()))
	@foreach (Request::all() as $param => $term)
		@php $params[$param] = strval($term) @endphp
	@endforeach
	{{ $items->appends($params)->links() }}
@else
	{{ $items->links() }}
@endif
<script>
	var searchActive = true;
</script>
