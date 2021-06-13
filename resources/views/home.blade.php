@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        <p class="lead">You're logged in!</p>
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
