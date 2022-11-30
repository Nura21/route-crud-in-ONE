      @extends('layouts.templates.template-crud')
      @section('title', __('app.projects.th').' '.__('app.menus.photo'))
      @section('body')
      <body class="hold-transition sidebar-mini">
      @endsection
      @section('main-menu', __('app.menus.photo'))
      @section('menu', __('app.menus.photo'))
      @section('process', __('app.buttons.list'). ' '.__('app.menus.photo'))
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
                                <th>{{ __('app.fields.photo') }}</th>
                                <th>{{ __('app.buttons.action') }}</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($photos as $photo)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $photo->code ?? ''}}</td>
                                <td class="col-md-12">
                                  @foreach (json_decode($photo->photo, true) as $item)
                                    <img src="{{ asset('img/'.$item ?? '') }}" style="width:300px; height:200px;" alt="" srcset="">
                                    <br>
                                    <br>
                                  @endforeach
                                </td>
                                <td>
                                  <a href="{{ url(strtolower(__('app.menus.photo')).'s/'.$photo->id.'/'.strtolower(__('app.buttons.edit'))) }}" class="btn btn-warning btn-xl" role="button">{{ __('app.buttons.edit') }}</a>
                                  <form action="{{ url(strtolower(__('app.menus.photo')).'s/'.$photo->id) }}" method="post">
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