@extends('layouts.templates.template-dashboard')
@section('title', __('app.projects.th').' '.__('app.menus.dashboard'))
@section('body')
<body class="hold-transition sidebar-mini layout-fixed">
@endsection
@section('main-menu', __('app.menus.dashboard'))
@section('menu', __('app.menus.dashboard'))
@section('process', __('app.buttons.list'))
@auth
@section('main')

  <div class="wrapper">
    @include('layouts.preloader')
    @include('layouts.navigations.navbar')
    @include('layouts.navigations.sidebar')
    @include('layouts.content-wrapper')
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            @foreach($lists as $list => $key)
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ $key }}</h3>
                    <p>{{ ucfirst($list) }}</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
    @include('layouts.navigations.footer')
  </div>
</body>
@endsection
@endauth