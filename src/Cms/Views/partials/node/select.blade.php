@if($types->count() !== 0)
	<ul>
		@foreach($types as $type)
			<li><a href="{{route('node.create', ['nodeType' => $type->id])}}">{{{$type->name}}}</a></li>
		@endforeach
	</ul>
@endif