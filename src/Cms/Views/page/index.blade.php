@include('cms::header')

<div class="inner">
	<div class="row show-grid">
		<div class="col-xs-4">
			<div class="node node-container">
				@foreach($pages as $page)
					<div class="node">
						<div><a href="{{route('page', ['page' => $page->id])}}">{{$page->title}}</a></div>
					</div>
				@endforeach

				<div><a href="{{route('node.create')}}" class="node-create"></a></div>
			</div>
		</div>
		<div class="col-xs-8">
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
	</div>
</div>

@include('cms::footer')