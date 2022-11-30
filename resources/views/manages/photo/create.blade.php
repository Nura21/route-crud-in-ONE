@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.photo'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.photo'))
@section('menu', __('app.menus.photo'))
@section('process', __('app.buttons.add').' '.__('app.menus.photo'))
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
                    <form action="{{ url(strtolower(__('app.menus.photo')).'s') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <x-input type="{{ __('app.fields.file') }}" name="{{ __('app.menus.photo') }}[]" placeholder="{{ __('app.fields.image') }}" class="form-control" classForm="form-group" value="{{ old(__('app.fields.image')) }}" multiple="multiple"/>

                      <x-button type="{{ __('app.buttons.submit') }}" class="btn btn-primary" classForm="form-group" name="{{ __('app.buttons.save') }}" />
                    </form>
                </div>
              </div>
          </section>
        </div>
        @include('layouts.navigations.footer')
      </div>
@endsection