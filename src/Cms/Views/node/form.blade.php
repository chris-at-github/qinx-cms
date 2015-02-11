@include('cms::header')

@if(isset($node) === true)

	{!! Form::model($node, ['route' => ['node.save', $node->id]]) !!}
		@include('cms::partials.node.form', ['node' => $node])
	{!! Form::close() !!}

@endif

@include('cms::footer')
