@extends('core.base')
@section('content')
<section id="main-content">
    <div class="container">
        @if ($user != null)
            <nav>
                <a href="{{ route('posts.create') }}">Create new post</a>
            </nav>
        @endif
        <div class="notes">
            @foreach($posts as $post)
                <div class="notes__item">
                    <h2>{{ $post['title'] }}</h2>
                    <div class="notes__item--info">
                        <span>Post created: {{ $post['created_at'] }}</span>
                        @if ($post['created_at'] != $post['updated_at'])
                            <span>Post been updated: {{ $post['updated_at'] }}</span>
                        @endif
                        <span>Author: {{ $post['name'] }}</span>
                    </div>
                    <p>{{ $post['body'] }}</p>
                    @if ($user != null)
                    <nav>
                        <a href="{{ route('posts.edit', $post['id']) }}">Edit</a>
                        <form action="{{ route('posts.delete', $post['id']) }}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit">Delete</button>
                        </form>
                    </nav>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection