<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="" alt="{{ __('app.projects.t').' '.__('app.projects.h') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ __('app.projects.th') }}</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          @foreach ($routes as $route)
            <x-menu name="{{ $route }}" icon="fa-users" routeName="{{ $route }}" />
          @endforeach

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <form action="{{ url(strtolower(__('app.buttons.logout'))) }}" method="POST">
                  @csrf
                  <button class="btn btn-light btn-block" align="right">{{ __('app.buttons.logout') }}</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>