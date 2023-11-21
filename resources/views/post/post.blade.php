@extends('layouts.main')

@section('container')
    {{-- <?php dd(count($post->comments)); ?> --}}
    <div class="row mt-5">
        <div class="col-5">
            <img src="http://127.0.0.1/Halaman-Anime/public/api/image/{{ $post->image }}" alt="" style="width: 100%;">
        </div>
        <div class="col-1"></div>
        <div class="col-6">
            <h3>{{ $post->title }}</h3>
            <p>Stock : {{ $post->news_content }}</p>
            
        </div>
    </div>
    <div class="row mt-4">
        <h2>Komentar</h2>
        @if (count($post->comments) == 0)
            <p>Belum ada komentar</p>
        @else
            @foreach ($post->comments as $comment)
                <p>{{ $comment->content }}</p>
            @endforeach
        @endif
    </div>
@endsection
