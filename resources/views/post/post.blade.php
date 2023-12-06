@extends('layouts.main')

@section('container')
{{-- <?php dd(count($post->comments)); ?> --}}
<div class="row mt-5">
    <div class="col-lg-12 pt-4 pt-lg-0">
        <h2 class="fw-bold text-center">{{ $post->title }}</h2>
        <hr class="mb-5 mt-5">
        <img src="http://127.0.0.1/Halaman-Anime/public/api/image/{{ $post->image }}" class="float-end imgshadow" alt="">
        <p class="ln-sm ">
            {!! nl2br($post->news_content)!!}
        </p>
    </div>

    <div style="text-align: left;" class="col-lg-5">

    </div>

</div>

<hr class="mb-5 mt-5">

<div class="row mb-5 p-4">
    <div class="col-md-12 col-lg-12 col-xl-12">


        @if(isset($_COOKIE['cookie_token']))
        <form method="POST" action="/comment">
            <div class="col-md-12 col-lg-10 col-xl-12 mb-5">
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                        <div class="form-outline w-100 mx-3">
                            @csrf
                            <textarea class="form-control" id="textAreaExample" rows="4" for="comments_content" name="comments_content" style="background: #fff;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post comment</button>
                    </div>
                    <div class="float-end mt-2 pt-1">
                    </div>
                </div>
            </div>

        </form>
        @endif
    
        @if (count($post->comments) == 0)
        <p>Belum ada komentar</p>
        @else
        @foreach ($post->comments as $comment)
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-start align-items-center">

                    <div>
                        <h6 class="fw-bold text-primary mb-1">{{$comment->commentator->username}}</h6>
                        <p class="text-muted small mb-0">
                            Shared - {{$post->created_at}}
                        </p>
                    </div>
                </div>
                <p class="mt-3 mb-4 pb-2">
                    {{$comment->comments_content}}
                </p>


            </div>
        </div>
        @endforeach
        @endif
    </div>
    @endsection