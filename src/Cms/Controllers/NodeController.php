<?php namespace Cms\Controllers;

class NodeController extends CmsController {
	public function create($nodeType = null) {
		$node				= null;
		$nodeTypes 	= new \App::make('\Cms\Repositories\NodeTypeRepository');

		if($nodeType !== null) {
			$namespace	= $nodeType->namespace;
			$node				=	with(new $namespace())->fill(array(
				'parent' 		=> 0,
				'type'	=> $nodeType->id
			));

			return $this->form($node);
		}

		return \View::make('cms::node.create')
			->with('types', $nodeTypes->findall());
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