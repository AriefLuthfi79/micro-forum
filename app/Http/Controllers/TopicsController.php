<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TopicRepository;
use App\Http\Requests\TopicStoreRequest;

/**
 * 
 */
class TopicsController extends Controller
{

	private $repository;

	/**
	* Injecting TopicRepository to constructor
	*
	* @param $repos TopicRepository
	*/
	public function __construct(TopicRepository $repos)
	{
		$this->middleware('auth');
		$this->repository = $repos;
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(TopicStoreRequest $request)
	{
		$data = [
			'title' => $request->title,
			'description' => $request->description,
			'category_id' => $request->category_id,
		];

		$this->repository->create($data);
		return redirect()->back();
	}

	/**
     * Display the specified resource.
     *
     * @param  $topic Object Topic
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
	public function show(Topic $topic)
	{
		$this->repository->addViews($topic);
		return view('topics.show', compact('topic'));
	}
}