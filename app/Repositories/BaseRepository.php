<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Container\Container as Application;

abstract class BaseRepository
{
	/**
	*
	* @var App
	*/
	private $app;

	/**
	*
	* @var Model
	*/
	public $model;

	/**
	*
	* @var Builder
	*/
	protected $builder;

	/**
	* @throws RepositoryException
	* @param $app Container as Application
	*/
	public function __construct(Application $app)
	{
		$this->app = $app;
		$this->makeModel();
	}

	/**
	* Specify the model class
	*
	* @return mixed
	*/
	abstract function model();

	/**
	* New Instances model
	* 
	* @return mixed
	*/
	public function newModel(array $data = [])
	{
		$model = new $this->model();
		$model->fill($data);

		return $model;
	}

	/**
	* New instance models
	*
	* @param array $dataModels
	* @return Collection
	*/
	public function newModels(array $dataModels)
	{
		$newModels = new Collection;
		foreach ($dataModels as $model) {
			$newModels->push($model);
		}

		return $newModels;
	}

	/**
	*
	* @param array $columns
	* @return mixed
	*/
	public function all($columns = array('*'))
	{
		return $this->model->get($columns);
	}

	/**
	* Will get the Query Builder class
	*
	* @return Illuminate/Database/Eloquent/Collection
	* @throws RepositoryException
	*/
	public function makeModel()
	{
		$this->model = $this->app->make($this->model());

		if (is_null($this->model) && !$this->model instanceof Model)
			throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

		return $this->builder = $this->model->newQuery();
	}

	/**
	* @param array
	* @return bool
	*/
	public function create(array $data)
	{
		if (Auth::check() && !array_key_exists('user_id', $data)) {
			$data['user_id'] = Auth::user()->id;
		}
		return $this->model->create($data);
	}

	/**
	* Delete the current model
	*
	* @param mixed $entity
	* @return boolean
	*/
	public function delete($entity)
	{
		return $entity->delete();
	}

	/**
	* Find the data by given object
	*
	* @param mixed $id
	* @param array $columns
	* @return object
	*/
	public function find($id, array $columns = ['*'])
	{
		return $this->model->find($id, $columns);
	}

	/**
	* Find or fail the data
	*
	* @param mixed $id
	* @param array $columns
	* @return object
	*/
	public function findOrFail($id, array $columns = ['*'])
	{
		return $this->model->findOrFail($id, $columns);
	}

	/**
	* Find or new object
	*
	* @param mixed $id
	* @param array $columns
	* @return object
	*/
	public function findOrNew($id, array $columns = ['*'])
	{
		return $this->model->findOrNew($id, $columns);
	}

	/**
	* Find Or create the data
	*
	* @param mixed $id
	* @param array $data
	* @return mixed
	*/
	public function findOrCreate($id, array $data)
	{
		$model = $this->findOrNew($id, $data);

		if (!$model->exists()) {
			$model->fill($data);
			$model->save();
		}
		return $model;
	}

	/**
	* Get the model's name
	*
	* @return string
	*/
	public function getModel()
	{
		return $this->model();
	}
}