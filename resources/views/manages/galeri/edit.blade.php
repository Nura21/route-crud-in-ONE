@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.galeri'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.galeri'))
@section('menu', __('app.menus.galeri'))
@section('process', __('app.buttons.edit').' '.__('app.menus.galeri'))
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
                    <form action="{{ url(strtolower(__('app.menus.galeri')).'s/'.$field->id) }}" method="POST" enctype="multipart/form-data">
                      @method('patch')
                      @csrf
                      <x-select name="photo_code" id="photo_code" class="form-control" classForm="form-group">
                        <option value="">CHOOSE</option>
                          @foreach ($photoDatas as $photo)
                            <option value="{{ $photo->code }}" {{ $field->photo_code == $photo->code ? 'selected' : '' }}>
                              {{ $photo->code }}
                            </option>
                          @endforeach
                      </x-select>
    
                      <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.title') }}" placeholder="{{ __('app.fields.title') }}" class="form-control" classForm="form-group" value="{{ $field->title ?? old(__('app.fields.title')) }}"/>
    
                      <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.description') }}" placeholder="{{ __('app.fields.description') }}" class="form-control" classForm="form-group" value="{{ $field->description ?? old(__('app.fields.description')) }}"/>
    
                      <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.video') }}" placeholder="{{ __('app.fields.video') }}" class="form-control" classForm="form-group" value="{{ $field->video ?? old(__('app.fields.video')) }}"/>
                        
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