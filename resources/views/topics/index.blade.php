@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Topics</li>
                    </ol>
                </div>

                <div class="card-body">

                    @include('layouts.messages')

                    @auth
                        <p>We want to see how many people will engage.
                            Feel free to add a new Topic to <strong>{{ $forum->title }}</strong>.</p>
                        <form class="form" method="POST" action="{{ route('topics.store', $forum->id) }}">
                            @csrf
                            <div class="row col-sm-12">
                                <div class="col-sm-4">
                                    <input required type="text" class="form-control" placeholder="Topic Title" aria-label="Topic Title" name="title">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Short Description" aria-label="Short Description" name="description">
                                </div>
                                <div class="col-sm-4">
                                    <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                    <button type="submit" class="btn btn-primary">Create New Topic</button>
                                </div>
                            </div>
                        </form>
                        <p class="lead"> </p>
                    @else
                        <p class="lead">Please login if you'd like to post {{ config('app.name') }}.
                            Or if you'd like to do anything else logging in would be the way to go.</p>
                    @endauth

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Topics
                                </th>
                                <th>
                                    Threads
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics->load('threads') as $topic)
                            <tr>
                                <td>
                                    <a href="{{ route('threads.index', [$forum->id, $topic->id]) }}">{{ $topic->title }}</a>
                                </td>
                                <td>
                                    {{ $topic->threads->count() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $topics->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
