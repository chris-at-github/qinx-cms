<?php namespace Cms\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/../Views', 'cms');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}
}