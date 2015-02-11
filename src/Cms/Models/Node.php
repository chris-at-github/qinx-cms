<?php namespace Cms\Models;

class Node extends Cms {

	/**
	 * database table name
	 *
	 * @var string $table
	 */
	protected $table = 'nodes';

	/**
	 * properties which can not fill over mass assignment
	 *
	 * @var array $guarded
	 */
	protected $guarded = array();

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

	/**
	 * Setter for node_type so i can use the camelCase style
	 *
	 * @param string $nodeType
	 * @return self
	 */
	public function setNodeTypeAttribute($nodeType) {
		$this->attributes['node_type'] = $nodeType;
	}

	/**
	 * Getter for node_type so i can use the camelCase style
	 *
	 * @param string $nodeType
	 * @return self
	 */
	public function getNodeTypeAttribute($nodeType) {
		if($nodeType === null && $this->attributes['node_type'] !== null) {
			$nodeType = $this->attributes['node_type'];
		}

		return $nodeType;
	}

	/**
	 * Save the model to the database.
	 *
	 * @param  array  $options
	 * @return bool
	 */
	public function save(array $options = array()) {
		parent::save($options);
	}
}