<?php namespace Cms\Controllers;

class NodeController extends CmsController {
	public function create($nodeType = null) {
		$nodeTypes = new \Cms\Repositories\NodeTypeRepository();

		return \View::make('cms::node.create')
			->with('type', $nodeType)
			->with('types', $nodeTypes->findall());
	}
}