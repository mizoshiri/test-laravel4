<?php

class AppliesController extends \BaseController {

	/**
	 * Display a listing of applies
	 *
	 * @return Response
	 */
	public function index()
	{
		$applies = Apply::all();

		return View::make('applies.index', compact('applies'));
	}

	/**
	 * Show the form for creating a new apply
	 *
	 * @return Response
	 */
	public function create($job_id)
	{
		$job = Job::findOrFail($job_id);
		$countries = Country::all()->lists('name','id');
		return View::make('site.applies.create', compact('job', 'countries'));
	}

	/**
	 * Store a newly created apply in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Apply::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Apply::create($data);

		return Redirect::route('applies.index');
	}

	/**
	 * Display the specified apply.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$apply = Apply::findOrFail($id);

		return View::make('applies.show', compact('apply'));
	}

	/**
	 * Show the form for editing the specified apply.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$apply = Apply::find($id);

		return View::make('applies.edit', compact('apply'));
	}

	/**
	 * Update the specified apply in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$apply = Apply::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Apply::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$apply->update($data);

		return Redirect::route('applies.index');
	}

	/**
	 * Remove the specified apply from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Apply::destroy($id);

		return Redirect::route('applies.index');
	}

}
