<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  {{-- @extends('layouts.links.ajax') --}}
  @include('layouts.links.crud-head')
</head>

@yield('body')
@yield('main')

@include('layouts.links.crud-body')
@yield('scripts')
<script >
  $(document).ready(function () {
    $('#datatable').DataTable();
  });
</script>
</body>
</html>