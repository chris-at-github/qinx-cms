<?php namespace Cms\Providers;

class ConfigServiceProvider extends \Illuminate\Support\ServiceProvider {

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->mergeConfigFrom(__DIR__ . '/../Config/cms.php', 'cms');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
	}
}