<?php namespace Cms\Repositories;

class NodeRepository extends CmsRepository {

	/**
	 * Constructor to set base model
	 */
	public function __construct() {
		parent::__construct(new \Cms\Models\Node);
	}

	/**
	 * load one node
	 *
	 * @param array $options
	 * @param string $type
	 * @return \Cms\Models\Node
	 */
	public function find($options = array(), $type = null) {
		$node  = null;
		$query = \DB::table('nodes AS node')
			->select('node.*');

		if(isset($options['id']) === true) {
			$query->where('node.id', '=', $options['id']);
		}

		if($type === null) {
			$query
				->addSelect('type.namespace')
				->leftJoin('node_types AS type', 'node.node_type', '=', 'type.id');
		}

		if(($raw = $query->first()) !== null) {
			if($type === null && $raw->namespace !== null) {
				$type = $raw->namespace;
			}

			$node = \App::make($type)->newFromBuilder((array) $raw);
		}

		return $node;
	}

	/**
	 * load all nodes that match on the options
	 *
	 * @param array $options
	 * @return \Illuminate\Support\Collection
	 */
	public function findall($options = array(), $xyz = null) {
		$nodes = \Illuminate\Support\Collection::make();

		return $nodes;
	}
}