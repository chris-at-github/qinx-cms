@foreach($node->getElements() as $element)
	@include($element->getPartial(), ['node' => $node, 'element' => $element])
@endforeach