@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.rangkaian_acara'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.rangkaian_acara'))
@section('menu', __('app.menus.rangkaian_acara'))
@section('process', __('app.buttons.add').' '.__('app.menus.rangkaian_acara'))
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
                    <form action="{{ url(strtolower(__('app.menus.rangkaian_acara')).'s') }}" method="POST">
                      @csrf
                        <x-select name="akad_nikah_code" id="akad_nikah_code" class="form-control" classForm="form-group">
                          <option value="">CHOOSE</option>
                          @foreach ($rangkaianAcaraDatas[0] as $akadNikahCode)
                              @foreach ($akadNikahCode as $item)
                                  <option value="{{ $item->code }}">
                                    {{ $item->place }}
                                  </option>
                              @endforeach
                          @endforeach
                        </x-select>

                        <x-select name="resepsi_code" id="resepsi_code" class="form-control" classForm="form-group">
                          <option value="">CHOOSE</option>
                          @foreach ($rangkaianAcaraDatas[1] as $resepsiCode)
                              @foreach ($resepsiCode as $item)
                                  <option value="{{ $item->code }}">
                                    {{ $item->place }}
                                  </option>
                              @endforeach
                          @endforeach
                        </x-select>

                        <x-button type="{{ __('app.buttons.submit') }}" class="btn btn-primary" classForm="form-group" name="{{ __('app.buttons.save') }}" />
                    </form>
                </div>
              </div>
          </section>
        </div>
        @include('layouts.navigations.footer')
      </div>
@endsection