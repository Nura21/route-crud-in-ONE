@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.konten'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.konten'))
@section('menu', __('app.menus.konten'))
@section('process', __('app.buttons.edit').' '.__('app.menus.konten'))
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
                    <form action="{{ url(strtolower(__('app.menus.konten')).'s/'.$field->id) }}" method="POST">
                      @method('patch')
                      @csrf
                      <x-select name="galeri_code" id="galeri_code" class="form-control" classForm="form-group">
                        <option value="">CHOOSE</option>
                        @foreach ($kontenDatas[0] as $galeriCode)
                            @foreach ($galeriCode as $item)
                                <option value="{{ $item->code }}" {{ $field->galeri_code == $item->code ? 'selected' : ''}}>
                                  {{ $item->code }}
                                </option>
                            @endforeach
                        @endforeach
                      </x-select>

                      <x-select name="mempelai_code" id="mempelai_code" class="form-control" classForm="form-group">
                        <option value="">CHOOSE</option>
                        @foreach ($kontenDatas[1] as $mempelaiCode)
                            @foreach ($mempelaiCode as $item)
                                <option value="{{ $item->code }}" {{ $field->mempelai_code == $item->code ? 'selected' : ''}}>
                                  {{ $item->code }}
                                </option>
                            @endforeach
                        @endforeach
                      </x-select>

                      <x-select name="rangkaian_acara_code" id="rangkaian_acara_code" class="form-control" classForm="form-group">
                        <option value="">CHOOSE</option>
                        @foreach ($kontenDatas[2] as $rangkaianAcaraCode)
                            @foreach ($rangkaianAcaraCode as $item)
                                <option value="{{ $item->code }}" {{ $field->rangkaian_acara_code == $item->code ? 'selected' : ''}}>
                                  {{ $item->code }}
                                </option>
                            @endforeach
                        @endforeach
                      </x-select>

                      <x-select name="transaction_code" id="transaction_code" class="form-control" classForm="form-group">
                        <option value="">CHOOSE</option>
                        @foreach ($kontenDatas[3] as $transactionCode)
                            @foreach ($transactionCode as $item)
                                <option value="{{ $item->code }}" {{ $field->transaction_code == $item->code ? 'selected' : ''}}>
                                  {{ $item->code }}
                                </option>
                            @endforeach
                        @endforeach
                      </x-select>

                      <x-input type="{{ __('app.fields.text') }}" name="rekening" placeholder="004-0989-24343-39" class="form-control" classForm="form-group" value="{{ $field->rekening ?? old('rekening') }}"/>

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