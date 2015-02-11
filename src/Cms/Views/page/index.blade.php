@include('cms::header')

<div class="inner">
	<div class="node node-container">
		@foreach($nodes as $node)
			<div class="node">
				<header>{{$node->name}}</header>
				<div><a href="{{route('node.form', ['node' => $node->id])}}">Bearbeiten</a></div>
			</div>
		@endforeach

		<div><a href="{{route('node.create')}}" class="node-create"></a></div>
	</div>
</div>

@include('cms::footer')