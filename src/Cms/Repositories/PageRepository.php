<?php namespace Cms\Repositories;

class PageRepository extends NodeRepository {

	/**
	 * Constructor to set base model
	 */
	public function __construct() {
		parent::__construct(new \Cms\Nodes\Page);
	}

	/**
	 * load all nodes that match on the options
	 *
	 * @param array $options
	 * @return \Illuminate\Support\Collection
	 */
	public function findall($options = array()) {
		return parent::findall(array(
			'namespace' => ['Cms\Nodes\Page']
		));
	}
}