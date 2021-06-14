@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>

                <div class="card-body">

                    @include('layouts.messages')

                    @auth
                        <p>Feel free to add a new Forum and see how many Topics &amp; Threads will be started as a result.</p>
                        <form class="form" method="POST" action="{{ route('forms.store') }}">
                            @csrf
                            <div class="row col-sm-12">
                                <div class="col-sm-4">
                                    <input required type="text" class="form-control" placeholder="Forum Title" aria-label="Forum Title" name="title">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Short Description" aria-label="Short Description" name="description">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Create New Forum</button>
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
                                    Forums
                                </th>
                                <th>
                                    Topics
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forums->load('topics') as $forum)
                            <tr>
                                <td>
                                    <a href="{{ route('topics.index', $forum->id) }}">{{ $forum->title }}</a>
                                </td>
                                <td>
                                    {{ $forum->topics->count() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $forums->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
