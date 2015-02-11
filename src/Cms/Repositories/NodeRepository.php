<?php namespace Cms\Repositories;

class NodeRepository extends CmsRepository {

	/**
	 * Constructor to set base model
	 */
	public function __construct() {
		parent::__construct(new \Cms\Models\NodeType);
	}

	/**
	 * load a node by id
	 *
	 * @param int $id
	 */
	public function findById($id) {
		$raw = \DB::table('nodes AS n')
		->select(array('n.*', 'nt.namespace'))
		->join('node_types AS nt', 'n.node_type', '=', 'nt.id')
		->where('n.id', '=', $id)
		->first();

		if($raw !== null) {
			$namespace 	= $raw->namespace;
			$node 			= new $namespace();

			return $node->fill((array) $raw);
		}

		return null;
	}
}