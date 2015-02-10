<?php namespace Cms\Elements;

class Text {

	/**
	 * type of this element
	 *
	 * @var string $type
	 */
	protected $type = 'text';

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
	* Gets the type of this element.
	*
	* @return string $type
	*/
	public function getType() {
		return $this->type;
	}

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
}