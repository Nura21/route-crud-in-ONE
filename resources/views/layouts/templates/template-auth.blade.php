<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @include('layouts.links.crud-head')
  @include('layouts.links.icheck-bootstrap-head')
</head>

  @yield('body')
  @yield('main')
  @include('layouts.links.crud-body')
  </body>
</html>