@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<a href="#" class="btn btn-outline-secondary pull-left">Comment</a>

			<div class="form-group">
				<label name="rating" class="col-sm-3 form-control-label">Give rating</label>
				<div class="col-sm-3" style="margin-left: 90px">
					<input type="hidden" name="rating" class="rating" id="rating">
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Topic
				</div>
				<div class="card-body">
					<div class="card-title">
						
						@if (Auth::check() && Auth::user()->id === $topic->user_id)
							<a href="#" class="btn btn-outline-info" style="padding:3px 10px; margin-bottom: 10px">Edit Topic</a>
						@endif

						<h4>{{ $topic->title }}</h4>
					</div>

					<div class="list-group">
						<li class="list-group-item">
							{!! $topic->description !!}
						</li>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('style')
	<link rel="stylesheet" href="{{ url('css/bootstrap-rating.css') }}">
	<style>
    .rating-symbol{
      color: #f6e729;
      height: 20px;
    }
 	</style>
@endsection

@section('scripts')
  <script src="{{ url('js/bootstrap-rating.js') }}"></script>
@endsection