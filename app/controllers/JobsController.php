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

}
