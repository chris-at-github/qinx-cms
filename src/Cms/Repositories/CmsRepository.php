<?php namespace Cms\Repositories;

class CmsRepository {

	/**
	 * model for this repository
	 *
	 * @var \Illuminate\Database\Eloquent\Model $model
	 */
	protected $model;

	/**
	 * constructor for CmsRepositoy
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 */
	public function __construct($model = null) {
		if($model !== null) {
			$this->model = $model;
		}
	}

	/**
	 * getter for model property
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	protected function model() {
		return $this->model;
	}

	/**
	 * find one model
	 *
	 * @param array $options
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function find($options = array()) {
		return $this->model->find($options['id'], array('*'));
	}

	/**
	 * Get all of the models from the database
	 *
	 * @param array $options
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function findall($options = array()) {
		return $this->model->all();
	}
}