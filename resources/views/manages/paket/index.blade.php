      @extends('layouts.templates.template-crud')
      @section('title', __('app.projects.th').' '.__('app.menus.paket'))
      @section('body')
      <body class="hold-transition sidebar-mini">
      @endsection
      @section('main-menu', __('app.menus.paket'))
      @section('menu', __('app.menus.paket'))
      @section('process', __('app.buttons.list'). ' '.__('app.menus.paket'))
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
                                <th>{{ __('app.fields.type') }}</th>
                                <th>{{ __('app.fields.price') }}</th>
                                <th>{{ __('app.fields.benefit') }}</th>
                                <th>{{ __('app.buttons.action') }}</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($pakets as $paket)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paket->code ?? ''}}</td>
                                <td>{{ $paket->type ?? ''}}</td>
                                <td>{{ 'Rp.'.$paket->price ?? ''}}</td>
                                <td class="col-md-12">
                                  @foreach (json_decode($paket->benefit) as $benefit)
                                      {{ $benefit }}
                                      <br>
                                  @endforeach
                                </td>
                                <td>
                                  <a href="{{ url(strtolower(__('app.menus.paket')).'s/'.$paket->id.'/'.strtolower(__('app.buttons.edit'))) }}" class="btn btn-warning btn-xl" role="button">{{ __('app.buttons.edit') }}</a>
                                  <form action="{{ url(strtolower(__('app.menus.paket')).'s/'.$paket->id) }}" method="post">
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