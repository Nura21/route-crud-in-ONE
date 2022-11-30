@extends('layouts.templates.template-crud')
@section('title', __('app.projects.th').' '.__('app.menus.paket'))
@section('body')
<body class="hold-transition sidebar-mini">
@endsection
@section('main-menu', __('app.menus.paket'))
@section('menu', __('app.menus.paket'))
@section('process', __('app.buttons.edit').' '.__('app.menus.paket'))
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
                    <form action="{{ url(strtolower(__('app.menus.paket')).'s/'.$field->id) }}" method="POST" enctype="multipart/form-data">
                      @method('patch')
                      @csrf
                      <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.type') }}" placeholder="{{ __('app.fields.type') }}" class="form-control" classForm="form-group" value="{{ $field->type ?? old(__('app.fields.type')) }}"/>

                      <x-input type="number" name="{{ __('app.fields.price') }}" placeholder="{{ __('app.fields.price') }}" class="form-control" classForm="form-group" value="{{ $field->price ?? old(__('app.fields.price')) }}"/>

                      <div class="form-group">
                        <button type="button" class="btn btn-default" onClick="addBenefit()">Add+</button>
                      </div>

                      @foreach (json_decode($field->benefit) as $benefit)
                        <x-input type="{{ __('app.fields.text') }}" name="{{ __('app.fields.benefit') }}[]" placeholder="{{ __('app.fields.benefit') }}" class="form-control" classForm="form-group" value="{{ $benefit ?? old(__('app.fields.benefit')) }}"/>
                      @endforeach

                      <div id="extra_benefit"></div>
                      <br>

                      <x-button type="{{ __('app.buttons.submit') }}" class="btn btn-primary" classForm="form-group" name="{{ __('app.buttons.save') }}" />
                    </form>
                  </div>
                </div>
              </div>
          </section>
        </div>
        @section('scripts')
          <script>
            function addBenefit(){
              let myDiv = document.createElement("div");
              myDiv.innerHTML = '<input type="text" name="benefit[]" placeholder="benefit" class="form-control" value=""/><br><button id="remove_benefit" class="btn btn-danger">Delete</button><br>'
              
              document.getElementById("extra_benefit").append(myDiv);
              console.log("hai");
            }
            $(document).ready(function(){
              $(document).on('click', '#remove_benefit', function(){
                $(this).parent().remove();
              });
            });
          </script>
        @endsection
        @include('layouts.navigations.footer')
      </div>
@endsection