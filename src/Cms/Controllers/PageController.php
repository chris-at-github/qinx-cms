<?php namespace Cms\Controllers;

class PageController extends CmsController {
	public function index() {
		return \View::make('cms::page/index');
	}
}