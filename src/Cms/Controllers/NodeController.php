<?php namespace Cms\Controllers;

class NodeController extends CmsController {
	public function create($nodeType = null) {
		$node				= null;
		$nodeTypes 	= new \Cms\Repositories\NodeTypeRepository();

		if($nodeType !== null) {
			$namespace	= $nodeType->namespace;
			$node				=	with(new $namespace())->fill(array(
				'parent' 		=> 0,
				'nodeType'	=> $nodeType->id
			));
		}

		return \View::make('cms::node.create')
			->with('node', $node)
			->with('type', $nodeType)
			->with('types', $nodeTypes->findall());
	}

	public function save($id = null) {
		if($id === null) {
			$nodeTypes 	= new \Cms\Repositories\NodeTypeRepository();
			$nodeType 	= $nodeTypes->find(array('id' => \Input::get('nodeType')));

			$namespace	= $nodeType->namespace;
			$node				=	new $namespace();

			$node->fill(\Input::all());
			$node->save();
		}
	}

	public function edit($id) {
		$node	= with(new \Cms\Repositories\NodeRepository())->findById($id);

		return \View::make('cms::node.create')
			->with('node', $node);
	}
}