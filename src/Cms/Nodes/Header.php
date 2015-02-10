<?php namespace Cms\Nodes;

class Header extends \Cms\Models\Node {

	/**
	* Initializes the element collection.
	*
	* @param \Illuminate\Support\Collection $elements
	* @return \Illuminate\Support\Collection
	*/
	public function initializeElements($elements) {
		$elements = parent::initializeElements($elements);

		$header = new \Cms\Elements\Text();
		$header
			->setName('header')
			->setLabel('Überschrift');
		$elements->put('header', $header);

		return $elements;
	}
}