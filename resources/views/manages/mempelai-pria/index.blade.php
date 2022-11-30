      @extends('layouts.templates.template-crud')
      @section('title', __('app.projects.th').' '.__('app.menus.mempelai_pria'))
      @section('body')
      <body class="hold-transition sidebar-mini">
      @endsection
      @section('main-menu', __('app.menus.mempelai_pria'))
      @section('menu', __('app.menus.mempelai_pria'))
      @section('process', __('app.buttons.list'). ' '.__('app.menus.mempelai_pria'))
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
                                <th>{{ __('app.fields.fullname') }}</th>
                                <th>{{ __('app.fields.father') }}</th>
                                <th>{{ __('app.fields.mother') }}</th>
                                <th>{{ __('app.fields.description') }}</th>
                                <th>{{ __('app.fields.photo') }}</th>
                                <th>{{ __('app.buttons.action') }}</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($mempelaiPrias as $mempelaiPria)
                              {{-- {{ dd($mempelaiPria) }} --}}
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mempelaiPria->code ?? ''}}</td>
                                <td>{{ $mempelaiPria->fullname ?? ''}}</td>
                                <td>{{ $mempelaiPria->father_name ?? ''}}</td>
                                <td>{{ $mempelaiPria->mother_name ?? ''}}</td>
                                <td>{{ $mempelaiPria->description ?? ''}}</td>
                                <td class="col-md-12">
                                  <img src="{{ asset('img/'.$mempelaiPria->photo) }}" style="width:300px; height:200px;" alt="" srcset="">
                                </td>
                                <td>
                                  <a href="{{ url(strtolower(__('app.menus.mempelai_pria')).'s/'.$mempelaiPria->id.'/'.strtolower(__('app.buttons.edit'))) }}" class="btn btn-warning btn-xl" role="button">{{ __('app.buttons.edit') }}</a>
                                  <form action="{{ url(strtolower(__('app.menus.mempelai_pria')).'s/'.$mempelaiPria->id) }}" method="post">
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