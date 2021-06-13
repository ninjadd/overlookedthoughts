@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

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
                        <p class="lead">Please login if you'd like to post to this Forum</p>
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
                                    {{ $forum->title }}
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
