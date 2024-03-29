@extends('layouts.main')

<section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
      <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
        <div class="p-4 m-3">
          <img src="/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
          <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Web Inventory</span></h4>
          <p class="text-muted"><P>PT. Dhiar Lestari Perkasa</P></p>
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            </div>
          @endif

          @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('loginError') }}
                  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
              </div>
          @endif
          <form method="POST" action="/login">
            @csrf
            <div class="form-group">
              <label for="email">Username</label>
              <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1" required autofocus>
              <div class="invalid-feedback">
                Please fill in your username
              </div>
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Password</label>
              </div>
              <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
              <div class="invalid-feedback">
                please fill in your password
              </div>
            </div>

            {{-- <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
              </div>
            </div> --}}

            <div class="form-group text-center">
              {{-- <a href="auth-forgot-password.html" class="float-left mt-3">
                Forgot Password?
              </a> --}}
              <button type="submit" class="btn btn-primary btn-block btn-icon icon-right" tabindex="4">
                Login
              </button>
            </div>

            {{-- <div class="mt-5 text-center">
              Don't have an account? <a href="auth-register.html">Create new one</a>
            </div> --}}
          </form>

          <div class="text-center mt-5 text-small">
            Copyright &copy; PT. DLP Made with 💙 2021
            {{-- <div class="mt-2">
              <a href="#">Privacy Policy</a>
              <div class="bullet"></div>
              <a href="#">Terms of Service</a>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="/img/unsplash/login-bg.jpg">
        <div class="absolute-bottom-left index-2">
          <div class="text-light p-5 pb-2">
            <div class="mb-5 pb-3">
              <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
              <h5 class="font-weight-normal text-muted-transparent">PT. Dhiar Lestari Perkasa</h5>
            </div>
            {{-- Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> --}}
          </div>
        </div>
      </div>
    </div>
  </section>