@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $data->title }}</div>
                        <div class="card-body">
                            <p class="fs-2">
                                Content
                            </p>
                            <p class="text-lg-start font-monospace">
                                {{ $data->content }}
                            </p>
                            <p class="fs-2">
                                Comments
                            </p>
                            @foreach($data->comments as $comment)
                                <div class="card p-3 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-row align-items-center">
                            <span>
                                <small class="font-weight-bold text-primary">{{ $comment->author }}</small>
                                <small class="font-weight-bold">{{ $comment->content }}</small>
                            </span>
                                        </div>
                                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
