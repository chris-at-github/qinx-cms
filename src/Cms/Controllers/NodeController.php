<?php namespace Cms\Controllers;

class NodeController extends CmsController {

	/**
	 * @param $nodeType \Cms\Models\NodeType
	 * @return mixed
	 */
	public function create($nodeType = null) {
		$node				= null;
		$nodeTypes 	= \App::make('\Cms\Repositories\NodeTypeRepository');

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

	/**
	 * @param $node \Cms\Models\Node
	 * @return \Illuminate\Contracts\View\View
	 */
	public function form($node) {
		return \View::make('cms::node.form')
			->with('node', $node)
			->with('types', \App::make('\Cms\Repositories\NodeTypeRepository')->findall());
	}

	/**
	 * @param $node \Cms\Models\Node
	 * @return \Illuminate\Support\Facades\Redirect
	 */
	public function store($node) {
		if($node->store(\Input::all()) === false) {
			return \Redirect::back()
				->withInput()
				->withErrors($node->errors());
		}

		return \Redirect::to('/');
	}
}