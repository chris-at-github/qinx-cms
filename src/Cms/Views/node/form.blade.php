@include('cms::header')

@if(isset($node) === true)

	{!! Form::model($node, ['route' => ['node.store', $node->id]]) !!}
		@if($node->type() !== null)
			<div>
				<header>{{$node->type()->name}}</header>
				{!! Form::text('type', $node->type()->namespace, ['readonly' => 'readonly']) !!}
			</div>
		@endif

		@include('cms::partials.node.form', ['node' => $node])

		<div class="form-actions">
			<button type="submit">Speichern</button>
		</div>
	{!! Form::close() !!}

@endif

@include('cms::footer')
