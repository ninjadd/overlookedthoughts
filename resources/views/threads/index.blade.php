@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('topics.index', $forum->id) }}">Topics</a></li>
                        <li class="breadcrumb-item active">Threads</li>
                    </ol>
                </div>

                <div class="card-body">

                    @include('layouts.messages')

                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Forum:</strong> {{ $forum->title }}</h5>
                                <small>{{ $forum->updated_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $forum->description }}</p>
                            <small><strong>Posted by:</strong> {{ $forum->user->name }}</small>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Topic:</strong> {{ $topic->title }}</h5>
                                <small>{{ $topic->updated_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $topic->description }}</p>
                            <small><strong>Posted by:</strong> {{ $topic->user->name }}</small>
                        </a>

                        @foreach ($threads->load('user') as $thread)

                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $thread->title }}</h5>
                                <small class="text-muted">{{ $thread->updated_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{!! nl2br($thread->body) !!}</p>
                            <small class="text-muted"><strong>Posted by:</strong> {{ $thread->user->name }}</small>
                        </a>

                        @endforeach
                    </div>

                </div>

                <div class="card-footer">
                    {{ $threads->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
