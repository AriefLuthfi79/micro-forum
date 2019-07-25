@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                <a class="list-group-item active">Forum</a>
                @if (count($data['forums']) == null)
                  <a href="#" class="list-group-item">Have no forum</a>
                @endif

                @foreach ($data['forums'] as $forum)
                    <a href="#" class="list-group-item">{{ $forum->name }}</a>
                @endforeach
            </ul>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Recent Post

                    <button class="btn btn-primary float-right add-topic" data-toggle="modal" data-target="#addModal">
                        <i class="fa fa-plus"></i> Create new Topic
                    </button>
                </div>

                @if (count($data['topics']) == null)
                    <ul class="list-group">
                        <b class="list-group-item">
                            Have no post
                        </b>
                    </ul>
                @endif
                <div class="card-body">
                    @foreach ($data['topics'] as $topics)
                        <ul class="list-group">
                            <a href="#" class="list-group-item" style="text-decoration: none;">
                                <div class="col-md-8 col-xs-9">
                                    {{ $topics->title }}
                                </div>
                                @if (count($topics->ratings))
                                    @for ($i=0; $i<$topics->averageRating(); $i++)
                                        &nbsp&nbsp&nbsp&nbsp<i class="fa fa-star" style="color:#f6e729;"></i>
                                    @endfor
                                @endif
                                <p class="float-right">
                                    <span class="fa fa-comments"> : 12 Replies</span>
                                    <br>
                                    <span class="fa fa-eye"> : 12 Views</span>
                                </p>
                            </a>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @include('categories.modal')
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    <script src="{{ asset('js/category.js') }}" type="text/javascript"></script>
@endsection