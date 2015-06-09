<?php

class JobsController extends \BaseController {

	/**
	 * Display a listing of jobs
	 *
	 * @return Response
	 */
	public function index()
	{
		$jobs = Job::all();
		return View::make('site/jobs/index', compact('jobs'));
	}

	/**
	 * Show the form for creating a new job
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('jobs.create');
	}

	/**
	 * Store a newly created job in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Job::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Job::create($data);

		return Redirect::route('jobs.index');
	}

	/**
	 * Display the specified job.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$job = Job::findOrFail($id);

		return View::make('site/jobs/show', compact('job'));
	}

	/**
	 * Show the form for editing the specified job.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$job = Job::find($id);

		return View::make('jobs.edit', compact('job'));
	}

	/**
	 * Update the specified job in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$job = Job::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Job::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$job->update($data);

		return Redirect::route('jobs.index');
	}

	/**
	 * Remove the specified job from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Job::destroy($id);

		return Redirect::route('jobs.index');
	}

}
