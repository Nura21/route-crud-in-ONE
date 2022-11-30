@extends('layouts.templates.template-auth')
@section('title', __('app.projects.t').' '.__('app.projects.h'))
@section('body')
  <body class="hold-transition login-page">  
@endsection
  @guest
  @section('main')
    <div class="login-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <blockquote class="blockquote text-center">
              <p class="mb-0">
                @error(lcfirst(__('app.fields.email')))
                  {{ $message }}
                @else
                  @error(lcfirst(__('app.fields.password')))
                    {{ $message }}
                  @else
                    @if (Session::has('message'))
                      {{ session('message') }}
                    @else
                      <a href="{{ url(lcfirst(__('app.fields.login'))) }}" class="h1"><b>{{ __('app.projects.t') }}</b>&nbsp;{{ __('app.projects.h') }}</a>
                    @endif
                  @enderror
                @enderror
              </p>
            </blockquote>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Smile, breathe, and go slowly</p>
      
            <form action="{{ url(lcfirst(__('app.buttons.login'))) }}" method="POST" id="loginForm">
              @csrf
                <x-input type="{{ __('app.fields.email') }}" name="{{ __('app.fields.email') }}" placeholder="{{ __('app.fields.email') }}" class="form-control" classForm="form-group" value="{{ old(__('app.fields.email')) }}"/>

                <x-input type="{{ __('app.fields.password') }}" name="{{ __('app.fields.password') }}" placeholder="{{ __('app.fields.password') }}" class="form-control" classForm="form-group" value="{{ old(__('app.fields.password')) }}" />
                
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                  <x-button type="{{ __('app.buttons.submit') }}" class="btn btn-primary btn-block" name="{{ __('app.buttons.login') }}" id="{{ __('app.buttons.login') }}" classForm="col-4" /> 
              </div>
            </form>
          </div>
        </div>
      </div>
  </body>
  @endsection
@endguest