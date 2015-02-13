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
	 * getter for relation to node_types
	 *
	 * @return \Cms\Models\NodeType
	 */
	public function type() {
		return $this->belongsTo('\Cms\Models\NodeType', 'node_type')->first();
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
	 * @param string $type
	 * @return self
	 */
	public function setTypeAttribute($type) {
		$this->attributes['node_type'] = $type;
	}

	/**
	 * Getter for node_type so i can use the camelCase style
	 *
	 * @param string $type
	 * @return self
	 */
	public function getTypeAttribute($type) {
		if($type === null && $this->attributes['node_type'] !== null) {
			$type = $this->attributes['node_type'];
		}

		return $type;
	}

	/**
	 * Save the model to the database.
	 *
	 * @param  array  $options
	 * @return bool
	 */
	public function save(array $options = array()) {
		$this->saveProperties();

		return parent::save($options);
	}

	/**
	 * save all element to the attributes attribute
	 *
	 * @return void
	 */
	public function saveProperties() {
		$properties = \Illuminate\Support\Collection::make();

		foreach($this->getElements() as $element) {
			$properties->put($element->getName(), $this->getAttributeValue($element->getName()));
		}

		$this->attributes['properties'] = $properties->toJson();
	}

	/**
	 * Set the array of model attributes. No checking is done.
	 *
	 * @param  array  $attributes
	 * @param  bool   $sync
	 * @return void
	 */
	public function setRawAttributes(array $attributes, $sync = false) {
		$properties = array();

		if(isset($attributes['properties']) === true && empty($attributes['properties']) === false) {
			$properties	 = json_decode($attributes['properties'], true);

			if($properties !== null) {
				$attributes += $properties;
			}
		}

		parent::setRawAttributes($attributes, $sync);
		$this->fill($properties, true);
	}
}