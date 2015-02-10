@include('cms::header')

@if(isset($node) === true)

	{!! Form::model($node, ['route' => 'node.save']) !!}
		@include('cms::partials.node.elements', ['node' => $node])
	{!! Form::close() !!}

@else
	@include('cms::partials.node.select', ['types' => $types])
@endif

@include('cms::footer')
