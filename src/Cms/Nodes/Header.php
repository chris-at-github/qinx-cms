<?php namespace Cms\Nodes;

class Header extends \Cms\Models\Node {

	/**
	 * value of header
	 *
	 * @var string $header
	 */
	protected $header;

	/**
	 * Getter for header
	 *
	 * @return string $header
	 */
	public function getHeaderAttribute() {
		return $this->header;
	}

	/**
	 * Setter for header
	 *
	 * @param string $header
	 * @return self
	 */
	public function setHeaderAttribute($header) {
		$this->header = $header;
		return $this;
	}

	/**
	* Initializes the element collection.
	*
	* @param \Illuminate\Support\Collection $elements
	* @return \Illuminate\Support\Collection
	*/
	public function initializeElements($elements) {
		$elements = parent::initializeElements($elements);

		$elements->put('header', with(new \Cms\Elements\Text)
			->setName('header')
			->setLabel('Überschrift')
		);

		return $elements;
	}
}