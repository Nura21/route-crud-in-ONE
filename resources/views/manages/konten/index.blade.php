      @extends('layouts.templates.template-crud')
      @section('title', __('app.projects.th').' '.__('app.menus.konten'))
      @section('body')
      <body class="hold-transition sidebar-mini">
      @endsection
      @section('main-menu', __('app.menus.konten'))
      @section('menu', __('app.menus.konten'))
      @section('process', __('app.buttons.list'). ' '.__('app.menus.konten'))
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
                        <div class="card-body col-md-12">
                          <table class="table table-head-fixed text-nowrap table-responsive" id="datatable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>{{ __('app.fields.code') }}</th>
                                <th>{{ __('app.menus.galeri').' '.__('app.fields.code') }}</th>
                                <th>{{ __('app.menus.mempelai').' '.__('app.fields.code') }}</th>
                                <th>{{ __('app.menus.rangkaian_acara').' '.__('app.fields.code') }}</th>
                                <th>{{ __('app.menus.transaction').' '.__('app.fields.code') }}</th>
                                <th>{{ __('app.fields.rekening') }}</th>
                                <th>{{ __('app.buttons.action') }}</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($kontens as $konten)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $konten->code ?? ''}}</td>
                                <td>{{ $konten->galeri_code ?? ''}}</td>
                                <td>{{ $konten->mempelai_code ?? ''}}</td>
                                <td>{{ $konten->rangkaian_acara_code ?? ''}}</td>
                                <td>{{ $konten->transaction_code ?? ''}}</td>
                                <td class="col-md-12">{{ $konten->rekening }}</td>
                                <td>
                                  <a href="{{ url(strtolower(__('app.menus.konten')).'s/'.$konten->id.'/'.strtolower(__('app.buttons.edit'))) }}" class="btn btn-warning btn-xl" role="button">{{ __('app.buttons.edit') }}</a>
                                  <form action="{{ url(strtolower(__('app.menus.konten')).'s/'.$konten->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">{{ __('app.buttons.delete') }}</button>
                                  </form> 
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </section>
              </div>
              @include('layouts.navigations.footer')
            </div>
      @endsection