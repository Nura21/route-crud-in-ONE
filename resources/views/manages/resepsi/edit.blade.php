@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.resepsi'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.resepsi'))
@section('menu', __('app.menus.resepsi'))
@section('process', __('app.buttons.edit').' '.__('app.menus.resepsi'))
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
                    <form action="{{ url(strtolower(__('app.menus.resepsi')).'s/'.$field->id) }}" method="POST" enctype="multipart/form-data">
                      @method('patch')
                      @csrf
                      <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.place') }}" placeholder="{{ __('app.fields.place') }}" class="form-control" classForm="form-group" value="{{ $field->place ?? old(__('app.fields.place')) }}"/>

                      <x-input type="date" name="{{ __('app.fields.date') }}" placeholder="{{ __('app.fields.date') }}" class="form-control" classForm="form-group" value="{{ $field->date ?? old(__('app.fields.date')) }}"/>
                      
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