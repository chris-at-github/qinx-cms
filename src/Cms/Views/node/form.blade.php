@include('cms::header')

@if(isset($node) === true)

	{!! Form::model($node, ['route' => 'node.save']) !!}
		<div>
			{!! Form::hidden('parent') !!}
			{!! Form::hidden('nodeType') !!}
		</div>

		@include('cms::partials.node.form', ['node' => $node])
	{!! Form::close() !!}

@endif

@include('cms::footer')
