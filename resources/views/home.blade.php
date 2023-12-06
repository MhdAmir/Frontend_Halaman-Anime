@extends('layouts.main')

@section('container')
<!--Main layout-->
<h5 class="fw-semibold text-center fs-2">Halaman Anime</h5>
<hr class="shadow-sm mt-4 mb-4">
<div class="container">
  <!--Section: News of the day-->
  @foreach (array_slice($posts, 0, 1) as $post)

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

      <div class="col-md-6 mb-4">
        <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">{{ $post->author->username }}</span>
        <h4><strong>{{ $post->title }}</strong></h4>
        <p class="text-muted">
          {!! Str::limit($post->news_content, 200) !!}
        </p>
        <a href="/post/{{ $post->id }}">
          <button type="button" class="btn btn-primary" href="/post/{{ $post->id }}">Read more</button>
        </a>
      </div>
    </div>
  </section>
  @endforeach
  <!--Section: News of the day-->

  <!--Section: Content-->
  <section>

    <div class="row gx-lg-5">
      @foreach (array_slice($posts, 1, 3) as $post)
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <!-- News block -->
        <div>
          <!-- Featured image -->
          <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4" data-mdb-ripple-color="light">
            <img src="http://127.0.0.1/Halaman-Anime/public/api/image/{{ $post->image }}" class="img-fluid rounded mx-auto d-block" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>

          <!-- Article data -->
          <div class="row mb-3">
            <div class="col-6">
              <a href="" class="text-info">
                <i class="fas fa-plane"></i>
                {{ $post->author->username }}
              </a>
            </div>

            <div class="col-6 text-end">
              <u> 15.07.2020</u>
            </div>
          </div>

          <!-- Article title and description -->
          <a href="/post/{{ $post->id }}" class="text-dark">
            <h5>
              {{ $post->title }}
            </h5>

            <p>
              {!! Str::limit($post->news_content, 50) !!}
            </p>
          </a>

          <hr />

        </div>
        <!-- News block -->
      </div>
      @endforeach
      
    </div>
  </section>
  <!--Section: Content-->

</div>
<!--Main layout-->
@endsection