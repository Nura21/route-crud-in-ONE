      @extends('layouts.templates.template-crud')
      @section('title', __('app.projects.th').' '.__('app.menus.kartu_ucapan'))
      @section('body')
      <body class="hold-transition sidebar-mini">
      @endsection
      @section('main-menu', __('app.menus.kartu_ucapan'))
      @section('menu', __('app.menus.kartu_ucapan'))
      @section('process', __('app.buttons.list'). ' '.__('app.menus.kartu_ucapan'))
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
                                <th>{{ __('app.fields.name') }}</th>
                                <th>{{ __('app.fields.ucapan') }}</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($kartuUcapans as $kartuUcapan)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kartuUcapan->code ?? ''}}</td>
                                <td>{{ $kartuUcapan->name ?? ''}}</td>
                                <td class="col-md-12">{{ $kartuUcapan->ucapan ?? ''}}</td>
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