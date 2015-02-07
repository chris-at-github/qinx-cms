<?php namespace Cms\Controllers;

class PageController extends \Illuminate\Routing\Controller {
	public function index() {
		return \View::make('cms::index');
	}
}