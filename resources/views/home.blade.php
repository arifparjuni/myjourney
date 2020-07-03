@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary my-3">Create Post</a>
                    <h3>Your Blog Posts</h3>

                    @if (count($posts) > 0)
                    <div class="container">
                        <div class="row">
                            <div class="col-md">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($posts as $post)
                                            <th scope="row">1</th>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <a href="/posts/{{ $post->id }}/edit" class="btn btn-success">Edit</a>
                                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin mau hapus?');">Delete</button>
                                                {!! Form::close() !!}
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <p>You have no post!</p>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
