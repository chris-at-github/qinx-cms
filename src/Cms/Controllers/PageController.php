<?php namespace Cms\Controllers;

class PageController extends CmsController {
	public function index() {
		$nodes = new \Cms\Repositories\NodeRepository();

		return \View::make('cms::page/index')
			->with('nodes', $nodes->findall(array(
				'namespace' => array(
					'not' => ['Cms\Nodes\Page']
				)
			)));
	}
}