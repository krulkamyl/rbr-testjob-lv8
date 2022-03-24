@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Comments') }}</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Comment</th>
                                <th>Post</th>
                                <th>Author</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->content }}</td>
                                    <td><a href="{{ route('posts.show', ['id' => $item->post_id]) }}" class="link-primary">{{ $item->post->title }}</a></td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination justify-content-center">
                            {!! $data->links() !!}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
