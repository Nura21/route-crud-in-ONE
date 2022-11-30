@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.mempelai_pria'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.mempelai_pria'))
@section('menu', __('app.menus.mempelai_pria'))
@section('process', __('app.buttons.edit').' '.__('app.menus.mempelai_pria'))
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
                    <form action="{{ url(strtolower(__('app.menus.mempelai_pria')).'s/'.$field->id) }}" method="POST" enctype="multipart/form-data">
                      @method('patch')
                      @csrf
                        <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.fullname') }}" placeholder="{{ __('app.fields.fullname') }}" class="form-control" classForm="form-group" value="{{ $field->fullname ?? old(__('app.fields.fullname')) }}"/>

                        <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.father') }}" placeholder="{{ __('app.fields.father') }}" class="form-control" classForm="form-group" value="{{ $field->father_name ?? old(__('app.fields.father')) }}"/>

                        <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.mother') }}" placeholder="{{ __('app.fields.mother') }}" class="form-control" classForm="form-group" value="{{ $field->mother_name ?? old(__('app.fields.mother')) }}"/>

                        <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.description') }}" placeholder="{{ __('app.fields.description') }}" class="form-control" classForm="form-group" value="{{ $field->description ?? old(__('app.fields.description')) }}"/>

                        <x-input type="{{ __('app.fields.file') }}" name="{{ __('app.fields.image') }}" placeholder="{{ __('app.fields.image') }}" class="form-control" classForm="form-group" value="{{ $field->photo ?? old(__('app.fields.image')) }}"/>
                        
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