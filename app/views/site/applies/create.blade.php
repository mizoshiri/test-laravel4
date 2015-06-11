@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ String::title($job->title) }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
  <h1>{{ $job->title }}</h1>
  <p>{{ $job->body }}</p>

  <h2>Application</h2>
  {{ Form::open(array('url' => '')) }}
    {{ Form::token()}}
    {{ Form::label('email', 'Email')}}
    {{Form::text('email', '');}}
  {{ Form::close() }}
  <form class="form-horizontal" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <div class="form-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
      <label class="col-md-3 control-label" for="first_name">First Name</label>
        <div class="col-md-5">
        <input class="form-control" type="text" name="first_name" id="first_name" value="{{{ Input::old('first_name') }}}" />
        {{ $errors->first('first_name', '<span class="help-inline">:message</span>') }}
        </div>
    </div>
    <div class="form-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
      <label class="col-md-3 control-label" for="last_name">Last Name</label>
        <div class="col-md-5">
        <input class="form-control" type="text" name="last_name" id="last_name" value="{{{ Input::old('last_name') }}}" />
        {{ $errors->first('last_name', '<span class="help-inline">:message</span>') }}
        </div>
    </div>
    <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
      <label class="col-md-3 control-label" for="email">Email</label>
        <div class="col-md-5">
        <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email') }}}" />
        {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="form-group {{{ $errors->has('country_id') ? 'error' : '' }}}">
      <label class="col-md-3 control-label" for="country_id">Country</label>
        <div class="col-md-5">{{Form::select('coutry_id', $countries)}}
        </div>
    </div>
    <div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
      <label class="col-md-3 control-label" for="address">Address</label>
        <div class="col-md-5">
        <input class="form-control" type="text" name="address" id="address" value="{{{ Input::old('address') }}}" />
        {{ $errors->first('address', '<span class="help-inline">:message</span>') }}
        </div>
    </div>
        <!-- Form Actions -->
    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <input type="button" value="Back" onClick="history.go(-1);return true;"  class="btn btn-default">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-success">Create</button>
      </div>
    </div>
  </form>

@stop
