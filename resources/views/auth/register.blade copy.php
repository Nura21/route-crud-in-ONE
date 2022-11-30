@extends('layouts.templates.template-auth')
@section('title', 'TH Register')
@section('body')
<body class="hold-transition register-page">
@endsection
@section('main')
<div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ url(__('app.buttons.smallRegister')) }}" class="h1"><b>{{ __('app.projects.t') }}</b>&nbsp;{{ __('app.projects.h') }}</a>
      </div>
      <div class="card-body">
        <form action="{{ url(__('app.buttons.smallRegister')) }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('app.fields.name') }}" name="name" id="name" required>
            {{-- @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror --}}
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('app.fields.email') }}" name="email" id="email" required>
            {{-- @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror --}}
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('app.fields.password') }}" name="password" id="password" required>
            {{-- @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror --}}
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">{{ __('app.buttons.register') }}</button>
            </div>
          </div>
        </form>
        <a href="{{ url(__('app.buttons.smallLogin')) }}" class="text-center">I already have a membership</a>
      </div>
    </div>
  </div>
</body>
@endsection