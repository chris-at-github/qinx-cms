<?php namespace Cms\Elements;

class Text {

	/**
	 * partial of this element
	 *
	 * @var string $partial
	 */
	protected $partial = 'cms::partials.element.text';

	/**
	 * name of this element
	 *
	 * @var string $name
	 */
	protected $name;

	/**
	 * label of this element
	 *
	 * @var string $label
	 */
	protected $label;

	/**
	* Gets the name of this element.
	*
	* @return string $name
	*/
	public function getName() {
		return $this->name;
	}

	/**
	* Sets the name of this element.
	*
	* @param string $name $name the name
	* @return self
	*/
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	* Gets the label of this element.
	*
	* @return string $label
	*/
	public function getLabel() {
		return $this->label;
	}

	/**
	* Sets the label of this element.
	*
	* @param string $label $label the label
	* @return self
	*/
	public function setLabel($label) {
		$this->label = $label;
		return $this;
	}

	/**
	 * return the path to partial to render the element
	 *
	 * @return string
	 */
	public function getPartial() {
		return $this->partial;
	}
}