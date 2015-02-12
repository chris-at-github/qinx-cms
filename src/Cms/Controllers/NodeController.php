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
		// if($id === null) {
		// 	$nodeTypes 	= new \Cms\Repositories\NodeTypeRepository();
		// 	$nodeType 	= $nodeTypes->find(array('id' => \Input::get('nodeType')));

		// 	$namespace	= $nodeType->namespace;
		// 	$node				=	new $namespace();

		// 	$node->fill(\Input::all());
		// 	$node->save();
		// }

		// dd($id);
	}

	public function form($node) {
		return \View::make('cms::node.form')
			->with('node', $node)
			->with('types', \App::make('\Cms\Repositories\NodeTypeRepository')->findall());
	}

	public function store($node) {
		if($node->store(\Input::all()) === false) {
			return \Redirect::back()
				->withInput()
				->withErrors($map->errors());
		}

		return \Redirect::to('/');
	}
}