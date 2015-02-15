<?php namespace Cms\Controllers;

class PageController extends CmsController {
	public function index($page) {
		$nodes = new \Cms\Repositories\NodeRepository();
		$pages = \App::make('\Cms\Repositories\PageRepository');

		return \View::make('cms::page/index')
			->with('nodes', $nodes->findall(array(
				'namespace' => array(
					'not' => ['Cms\Nodes\Page']
				)
			)))
			->with('pages', $pages->findall(array(
				'parent' => $page->id
			)));
	}
}