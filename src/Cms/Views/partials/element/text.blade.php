<div class="form-item">
	<label class="form-label" for="{{$element->getName()}}">{{$element->getLabel()}}</label>
	{!!Form::text($element->getName(), null, ['id' => $element->getName(), 'class' => 'form-field'])!!}
</div>