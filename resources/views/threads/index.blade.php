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
                        <div class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Forum:</strong> {{ $forum->title }}</h5>
                                <small>{{ $forum->updated_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $forum->description }}</p>
                            <small><strong>Posted by:</strong> {{ $forum->user->name }}</small>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Topic:</strong> {{ $topic->title }}</h5>
                                <small>{{ $topic->updated_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $topic->description }}</p>
                            <small><strong>Posted by:</strong> {{ $topic->user->name }}</small>
                        </div>

                        @foreach ($threads->load('user') as $thread)

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $thread->title }}</h5>
                                <small class="text-muted">{{ $thread->updated_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{!! nl2br($thread->body) !!}</p>
                            <small class="text-muted"><strong>Posted by:</strong> {{ $thread->user->name }}</small>
                        </div>

                        @endforeach

                        @auth
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="justify-content-between">

                                    <form class="form" method="POST" action="{{ route('threads.store', [$forum->id, $topic->id]) }}">
                                        @csrf
                                        <div class="row col-sm-12">
                                            <div class="col-sm-4">
                                                <input required type="text" class="form-control" placeholder="Thread Title" aria-label="Thread Title" name="title">
                                            </div>
                                            <div class="col-sm-6">
                                                <textarea required class="form-control" placeholder="Thread Body" aria-label="Thread Body" name="body"></textarea>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-primary">Post</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        @else
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="lead">Please login if you'd like to post {{ config('app.name') }}.
                                        Or if you'd like to do anything else logging in would be the way to go.</p>
                                </div>
                            </div>
                        @endauth

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
