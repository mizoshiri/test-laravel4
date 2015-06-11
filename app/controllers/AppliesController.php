<?php

class AppliesController extends \BaseController {

  protected $apply;

  /**
  * Inject the models.
  * @param Post $post
  */
  public function __construct(Apply $apply)
  {
    parent::__construct();
    $this->apply = $apply;
  }

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
    $me = (Session::has('me')) ? Session::get('me') : false;
    return View::make('site.applies.create', compact('job', 'countries', 'me'));
  }

  /**
   * Update data and Show the form for creating a new apply
   *
   * @return Response
   */
  public function postCreate($job_id)
  {
    // Declare the rules for the form validation
    $rules = array(
      'first_name'   => 'required|min:3',
      'last_name' => 'required|min:3',
      'email' => 'required|email',
      'address' => 'required|min:3',
    );
    // Validate the inputs
    $validator = Validator::make(Input::all(), $rules);
    // Check if the form validates with success
    if ($validator->passes())
    {
      $this->apply->first_name  = Input::get('first_name');
      $this->apply->last_name   = Input::get('last_name');
      $this->apply->email       = Input::get('email');
      $this->apply->country_id  = Input::get('country_id');
      $this->apply->address     = Input::get('address');
      $this->apply->job_id      = $job_id;

      if($this->apply->save())
      {
        //Redirect to the new blog post page
        return Redirect::to('/applies/'.$job_id.'/create')->with('success', Lang::get('Thank you for applying :-)'));
      }
      // Redirect to the blog post create page
      return Redirect::to('site.applies.creat')->withInput()->withErrors($validator);
    }else{
      return Redirect::to('/applies/'.$job_id.'/create')->withInput()->withErrors($validator);
    }
  }

}
