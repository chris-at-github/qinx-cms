@foreach($node->getElements() as $element)
	{{$element->getType()}}
	@include('cms::partials.element.text', ['node' => $node, 'element' => $element])
@endforeach

{!!dd($node->getElements())!!}