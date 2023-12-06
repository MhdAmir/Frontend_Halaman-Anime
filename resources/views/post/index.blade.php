@extends('layouts.main')

@section('container')
<h5 class="fw-semibold text-center fs-2">Postingan Halaman Anime</h5>
<hr class="shadow-sm mt-4 mb-4">
@if(isset($answer))
<button type="button" class="btn btn-info fw-bold mb-5" data-mdb-ripple-init><a href="/post_store">+ Postingan</a></button>
@endif
@if (count($posts) > 0)
<div class="row" style="place-self: stretch;">
  @foreach ($posts as $post)

  <section class="border-bottom pb-4 mb-5">
    <div class="row gx-5">
      <div class="col-md-6 mb-4">
        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
          <img src="http://127.0.0.1/Halaman-Anime/public/api/image/{{ $post->image }}" class="img-fluid rounded" />
          <a href="/post/{{ $post->id }}">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>
      </div>

      <div class="col-md-6 mb-5">

        <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">{{ $post->author->username }}</span>
        <h4><strong>{{ $post->title }}</strong></h4>
        <p class="text-muted">
          {!! Str::limit($post->news_content, 200) !!}
        </p>
        <a href="/post/{{ $post->id }}">
          <button type="button" class="btn btn-primary" href="/post/{{ $post->id }}">Read more</button>
        </a>

        @if(isset($answer))
        @if($post->author_id === $answer['id'])
        <div class="d-flex justify-content-between align-items-center mt-5">
          <button type="button" class="btn btn-warning ps-3 pe-3">
            <a href="/edit-post/{{ $post->id }}">Edit &nbsp;<i class="bi bi-pencil-square"></i></a>
          </button>
          <form method="POST" action="/post/{{ $post->id }}" onsubmit="return confirm('Ingin Menghapus Data Tersebut?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>
              Hapus</button>
          </form>
        </div>
        @endif
        @endif
      </div>
    </div>
  </section>

  @endforeach
</div>
@else
<p class="text-center fs-4">Post tidak ditemukan!</p>
@endif
@endsection