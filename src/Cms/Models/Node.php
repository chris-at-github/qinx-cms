<?php namespace Cms\Models;

class Node extends Cms {

	/**
	 * database table name
	 *
	 * @var string $table
	 */
	protected $table = 'nodes';

	/**
	 * element collection
	 *
	 * @var \Illuminate\Support\Collection $elements
	 */
	protected $elements;

	/**
	 * init method for node
	 *
	 * @return \Cms\Models\Node
	 */
	public function __construct() {
		$this->setElements($this->initializeElements(\Illuminate\Support\Collection::make()));
	}

	/**
	* Gets the element collection.
	*
	* @return \Illuminate\Support\Collection $elements
	*/
	public function getElements() {
		return $this->elements;
	}

	/**
	* Sets the element collection.
	*
	* @param \Illuminate\Support\Collection $elements
	* @return self
	*/
	public function setElements($elements) {
		$this->elements = $elements;
		return $this;
	}

	/**
	* Initializes the element collection.
	*
	* @param \Illuminate\Support\Collection $elements
	* @return \Illuminate\Support\Collection
	*/
	public function initializeElements($elements) {
		return $elements;
	}
}