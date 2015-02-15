<?php namespace Cms\Repositories;

class PageRepository extends NodeRepository {

	/**
	 * Constructor to set base model
	 */
	public function __construct() {
		parent::__construct(new \Cms\Nodes\Page);
	}

	/**
	 * load one node
	 *
	 * @param array $options
	 * @param string $type
	 * @return \Cms\Models\Node
	 */
	public function find($options = array(), $type = '\Cms\Nodes\Page') {
		return parent::find($options, $type);
	}

	/**
	 * load all nodes that match on the options
	 *
	 * @param array $options
	 * @return \Illuminate\Support\Collection
	 */
	public function findall($options = array()) {
		$options['namespace'] = ['Cms\Nodes\Page'];
		return parent::findall($options);
	}
}