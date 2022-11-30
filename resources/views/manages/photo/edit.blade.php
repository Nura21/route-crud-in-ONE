@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.photo'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.photo'))
@section('menu', __('app.menus.photo'))
@section('process', __('app.buttons.edit').' '.__('app.menus.photo'))
@section('main')
    <div class="wrapper">
        @include('layouts.preloader')
        @include('layouts.navigations.navbar')
        @include('layouts.navigations.sidebar')
        @include('layouts.content-wrapper')
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">General</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{ url(strtolower(__('app.menus.photo')).'s/'.$field->id) }}" method="POST" enctype="multipart/form-data">
                      @method('patch')
                      @csrf
                      <x-input type="{{ __('app.fields.file') }}" name="{{ __('app.fields.photo') }}[]" placeholder="{{ __('app.fields.photo') }}" class="form-control" classForm="form-group" value="{{ $field->photo ?? old(__('app.fields.photo')) }}" multiple="multiple"/>
                      <br>
                      @foreach (json_decode($field->photo, true) as $item)
                        <img src="{{ asset('img/'.$item ?? '') }}" style="width:300px; height:200px;" alt="" srcset="">
                        <br>
                        <br>
                      @endforeach
                        <x-button type="{{ __('app.buttons.submit') }}" class="btn btn-primary" classForm="form-group" name="{{ __('app.buttons.save') }}" />
                    </form>
                  </div>
                </div>
              </div>
          </section>
        </div>
        @include('layouts.navigations.footer')
      </div>
@endsection