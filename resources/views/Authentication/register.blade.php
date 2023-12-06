@extends('layouts.main')

@section('container')
<main class="form-signin m-auto border p-4 rounded-3 shadow mb-5">
    <form class="/login" method="POST">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating mt-3">
        <input type="email" class="form-control @error('email')
          is-invalid
        @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
        <label for="email">Email address</label>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>

      <div class="form-floating mt-3">
        <input type="username" class="form-control @error('username')
          is-invalid
        @enderror" name="username" id="username" placeholder="name@example.com" value="{{ old('username') }}" required>
        <label for="username">User Name</label>
        @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>

      <div class="form-floating mt-3">
        <input type="password" class="form-control @error('password')
          is-invalid
        @enderror" name="password" id="password" placeholder="Password" required>
        <label for="password">Password</label>
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>

      <div class="form-floating mt-3">
        <input type="firstname" class="form-control @error('firstname')
          is-invalid
        @enderror" name="firstname" id="firstname" placeholder="name@example.com" value="{{ old('firstname') }}" required>
        <label for="firstname">First Name</label>
        @error('firstname')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>

      <div class="form-floating mt-3">
        <input type="lastname" class="form-control @error('lastname')
          is-invalid
        @enderror" name="lastname" id="lastname" placeholder="name@example.com" value="{{ old('lastname') }}" required>
        <label for="lastname">Last Name</label>
        @error('lastname')
          <div class="invalid-feedback">
            {{ $message }}
          </div>                
        @enderror
      </div>


      <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Sign Up</button>
    </form>
    <small class="d-block text-center mt-3">Do you have an account? <a href="/login">Sign in</a></small>
</main>
<!-- <main class="form-signin m-auto border p-4 rounded-3 shadow">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form method="POST" action="/register">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="username">Username</label>
        <input type="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="firstname">first name</label>
        <input type="firstname" name="firstname" required>

        <label for="lastname">last name</label>
        <input type="lastname" name="lastname" required>

        <button type="submit">Login</button>
    </form>
    <small class="d-block text-center mt-3">Don't have an account? <a href="/register">Sign up</a></small>
</main> -->
@endsection