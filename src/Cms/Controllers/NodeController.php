<?php namespace Cms\Controllers;

class NodeController extends CmsController {
	public function create($nodeType = null) {
		$node				= null;
		$nodeTypes 	= new \Cms\Repositories\NodeTypeRepository();

		if($nodeType !== null) {
			$namespace	= $nodeType->namespace;
			$node				=	new $namespace();
		}

		return \View::make('cms::node.create')
			->with('node', $node)
			->with('type', $nodeType)
			->with('types', $nodeTypes->findall());
	}
}