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
	public function findall($options = array()) {
		$nodes = \Illuminate\Support\Collection::make();
		$query = \DB::table('nodes AS node')
			->select(['node.*', 'type.namespace'])
			->leftJoin('node_types AS type', 'node.node_type', '=', 'type.id');

		if(isset($options['id']) === true) {
			$query->where('node.id', '=', $options['id']);
		}

		if(isset($options['parent']) === true) {
			$query->where('node.parent', '=', $options['parent']);
		}

		if(isset($options['namespace']) === true) {
			if(isset($options['namespace']['not']) === true) {
				$query->whereNotIn('type.namespace', $options['namespace']['not']);
				unset($options['namespace']['not']);
			}

			if(empty($options['namespace']) === false) {
				$query->whereIn('type.namespace', $options['namespace']);
			}
		}

		if(($raw = $query->get()) !== null) {
			foreach($raw as $value) {
				$type = $value->namespace;
				$node = \App::make($type)->newFromBuilder((array) $value);

				if($node instanceof \Cms\Models\Node) {
					$nodes->put($value->id, $node);
				}
			}
		}

		return $nodes;
	}
}