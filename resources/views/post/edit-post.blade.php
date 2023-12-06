@extends('layouts.main')

@section('container')

<div class="mb-5">
    <h5 class="fw-semibold mb-3 fs-4">Edit Post</h5>
    @if (session()->has('successEdit'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('successEdit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="mb-3 row">
            <label for="title" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
                <div class="form-floating">
                    <textarea class="form-control p-2" placeholder="" id="description" name="description" style="min-height: 150px;" required>{{ $post->news_content }}</textarea>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end w-100 mt-3">
            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal"><a href="/post">Batal</a></button>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
    </form>
</div>
@endsection