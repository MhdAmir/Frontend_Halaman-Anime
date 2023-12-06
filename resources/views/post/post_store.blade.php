@extends('layouts.main')

@section('container')
<div class="mb-5">
    <form method="POST" action="/post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="title" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
                <div class="form-floating">
                    <textarea class="form-control p-2" placeholder="" id="description" name="description" style="min-height: 150px;" required></textarea>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="gambar" class="col-sm-3 col-form-label">Pilih gambar</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" id="gambar" name="image" accept="image/*">
            </div>
        </div>
        <div class="d-flex justify-content-end w-100 mt-3">
            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal"><a href="/post">Batal</a></button>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
    </form>
</div>
@endsection