<?php namespace Cms\Repositories;

class NodeTypeRepository extends CmsRepository {

	/**
	 * Constructor to set base model
	 */
	public function __construct() {
		parent::__construct(new \Cms\Models\NodeType);
	}
}