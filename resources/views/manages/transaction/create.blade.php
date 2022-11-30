@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.transaction'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.transaction'))
@section('menu', __('app.menus.transaction'))
@section('process', __('app.buttons.add').' '.__('app.menus.transaction'))
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
                    <form action="{{ url(strtolower(__('app.menus.transaction')).'s') }}" method="POST">
                      @csrf
                        <x-select name="paket_code" id="paket_code" class="form-control" classForm="form-group">
                          <option value="">CHOOSE</option>
                          @foreach ($transactionDatas[0] as $paketCode)
                              @foreach ($paketCode as $item)
                                  <option value="{{ $item->code }}">
                                    {{ $item->type }}
                                  </option>
                              @endforeach
                          @endforeach
                        </x-select>
                        
                        <x-select name="user_code" id="user_code" class="form-control" classForm="form-group">
                          <option value="">CHOOSE</option>
                          @foreach ($transactionDatas[1] as $userCode)
                              @foreach ($userCode as $item)
                                  <option value="{{ $item->code }}">
                                    {{ $item->email }}
                                  </option>
                              @endforeach
                          @endforeach
                        </x-select>

                        <x-select name="template_code" id="template_code" class="form-control" classForm="form-group">
                          <option value="">CHOOSE</option>
                          @foreach ($transactionDatas[2] as $templateCode)
                              @foreach ($templateCode as $item)
                                  <option value="{{ $item->code }}">
                                    {{ $item->name }}
                                  </option>
                              @endforeach
                          @endforeach
                        </x-select>

                        <x-input type="date" name="order" placeholder="order" class="form-control" classForm="form-group" value="{{ old('order') }}"/>

                        <x-input type="date" name="usage" placeholder="usage" class="form-control" classForm="form-group" value="{{ old('usage') }}"/>

                        <x-button type="{{ __('app.buttons.submit') }}" class="btn btn-primary" classForm="form-group" name="{{ __('app.buttons.save') }}" />
                    </form>
                </div>
              </div>
          </section>
        </div>
        @include('layouts.navigations.footer')
      </div>
@endsection