<?php

namespace App\Repositories;

/**
 * 
 */
class TopicRepository extends BaseRepository
{
	/**
	* Specify the model's name by overriding it from the base class
	*
	* @return App\Models\Topic
	*/
	function model()
	{
		return \App\Models\Topic::class;
	}

	/**
	* Adding views every shows the topic
	*
	* @param array $data
	* @return bool
	*/
	public function addViews(object $model)
	{
		$model->views += 1;
		return $model->save();
	}
}