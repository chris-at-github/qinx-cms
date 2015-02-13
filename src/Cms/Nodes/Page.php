<?php namespace Cms\Nodes;

class Page extends \Cms\Models\Node {

	/**
	 * value of title
	 *
	 * @var string $title
	 */
	protected $title;

	/**
	 * Getter for title
	 *
	 * @return string $title
	 */
	public function getTitleAttribute() {
		return $this->title;
	}

	/**
	 * Setter for title
	 *
	 * @param string $title
	 * @return self
	 */
	public function setTitleAttribute($title) {
		$this->title = $title;
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

		$elements->put('title', with(new \Cms\Elements\Text)
			->setName('title')
			->setLabel('Seitentitel')
		);

		return $elements;
	}
}