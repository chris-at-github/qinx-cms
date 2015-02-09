@include('cms::header')

@if(isset($type) === true)

@else
	@include('cms::partials.node.select', ['types' => $types])
@endif

@include('cms::footer')
