@extends('site.layouts.default')

{{-- Content --}}
@section('content')
@foreach ($jobs as $job)
<div class="row">
	<div class="col-md-8">
		<!-- job Title -->
		<div class="row">
			<div class="col-md-8">
				<h4><strong><a href="/jobs/{{ $job->id }}">{{ String::title($job->title) }}</a></strong></h4>
			</div>
		</div>
		<!-- ./ job title -->

		<!-- job Content -->
		<div class="row">
			<div class="col-md-6">
				<p>
					{{ String::tidy(Str::limit($job->body, 200)) }}
				</p>
			</div>
		</div>
	</div>
</div>

<hr />
@endforeach


@stop
