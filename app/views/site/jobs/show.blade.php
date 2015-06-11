@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ String::title($job->title) }}} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent

@stop

{{-- Content --}}
@section('content')
<h1>{{ $job->title }}</h1>

<p>{{ $job->body }}</p>

<div>
	<span class="badge badge-info">jobed {{{ $job->created_at }}}</span>
	<a onClick="history.go(-1);return true;"  class="btn btn-default">Back</a>
	<a class="btn btn-mini btn-primary" href="/applies/{{{ $job->id }}}/create">Apply</a>
</div>

<hr />

@stop
