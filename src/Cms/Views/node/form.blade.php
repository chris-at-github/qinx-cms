@include('cms::header')

@if(isset($node) === true)

	{!! Form::model($node, ['route' => ['node.store', $node->id]]) !!}
		@if($node->type() !== null)
			<header>{{$node->type()->name}}</header>
		@endif

		<div class="row">
			@if($node->type() !== null)
				<div class="col-xs-3 form-item">
					<label class="form-label" for="type">Typ</label>
					{!! Form::select('type', $types->lists('name', 'id'), $node->type()->id, ['id' => 'type', 'class' => 'form-field']) !!}
				</div>
			@endif

			<div class="col-xs-3 form-item">
				<div class="col-xs form-item">
					<label class="form-label" for="parent">Elternelement</label>
					{!! Form::text('parent', $node->parent, ['id' => 'parent', 'class' => 'form-field']) !!}
				</div>
			</div>
		</div>

		@include('cms::partials.node.form', ['node' => $node])

		<div class="form-actions">
			<button type="submit">Speichern</button>
		</div>
	{!! Form::close() !!}

@endif

@include('cms::footer')