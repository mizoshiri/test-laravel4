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
<h3>{{ $job->title }}</h3>

<p>{{ $job->body }}</p>

<div>
	<span class="badge badge-info">jobed {{{ $job->created_at }}}</span>
</div>

<hr />

@stop
