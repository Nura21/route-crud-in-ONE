@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.mempelai'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.mempelai'))
@section('menu', __('app.menus.mempelai'))
@section('process', __('app.buttons.edit').' '.__('app.menus.mempelai'))
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
                    <form action="{{ url(strtolower(__('app.menus.mempelai')).'s/'.$field->id) }}" method="POST" enctype="multipart/form-data">
                      @method('patch')
                      @csrf
                        <x-select name="mempelai_pria_code" id="mempelai_pria_code" class="form-control" classForm="form-group">
                          <option value="">CHOOSE</option>
                          @foreach ($mempelaiDatas[0] as $mempelaiPriaCode)
                              @foreach ($mempelaiPriaCode as $item)
                                  <option value="{{ $item->code }}" {{ $field->mempelai_pria_code == $item->code ? 'selected' : ''}}>
                                    {{ $item->fullname }}
                                  </option>
                              @endforeach
                          @endforeach
                        </x-select>

                        <x-select name="mempelai_wanita_code" id="mempelai_wanita_code" class="form-control" classForm="form-group">
                          <option value="">CHOOSE</option>
                          @foreach ($mempelaiDatas[1] as $mempelaiWanitaCode)
                              @foreach ($mempelaiWanitaCode as $item)
                                  <option value="{{ $item->code }}" {{ $field->mempelai_wanita_code == $item->code ? 'selected' : ''}}>
                                    {{ $item->fullname }}
                                  </option>
                              @endforeach
                          @endforeach
                        </x-select>

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