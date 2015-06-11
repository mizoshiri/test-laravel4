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

  <a class="btn btn-block btn-social btn-facebook" href="/login/fb/{{ $job->id }}"><i class="fa fa-facebook"></i> Sign in with Facebook</a>

  {{Form::open(array('url' => url('applies/'.$job->id.'/create'), 'class'=>'form-horizontal')) }}

    {{ Form::token() }}
    <div class="form-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
      {{ Form::label('first_name', 'First Name', array('class' => 'col-md-3 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('first_name', $me['first_name'], array('class' => 'form-control')) }}
        {{ $errors->first('first_name', '<span class="text-danger">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
      {{ Form::label('last_name', 'Last Name', array('class' => 'col-md-3 control-label')) }}
      <div class="col-md-5">
      {{ Form::text('last_name', $me['last_name'], array('class' => 'form-control')) }}
      {{ $errors->first('last_name', '<span class="text-danger">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
      {{ Form::label('email', 'Email', array('class' => 'col-md-3 control-label')) }}
      <div class="col-md-5">
      {{ Form::text('email', $me['email'], array('class' => 'form-control')) }}
      {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{{ $errors->has('country_id') ? 'error' : '' }}}">
      {{ Form::label('country_id', 'Country', array('class' => 'col-md-3 control-label')) }}
      <div class="col-md-5">{{Form::select('country_id', $countries)}}</div>
    </div>
    <div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
      {{ Form::label('address', 'Address', array('class' => 'col-md-3 control-label')) }}
      <div class="col-md-5">
      {{ Form::text('address', '', array('class' => 'form-control')) }}
      {{ $errors->first('address', '<span class="text-danger">:message</span>') }}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <input type="button" value="Back" onClick="history.go(-1);return true;"  class="btn btn-default">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-success">Create</button>
      </div>
    </div>
  {{ Form::close() }}

@stop
