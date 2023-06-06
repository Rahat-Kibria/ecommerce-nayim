<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- all meta link --}}
    @include('admin.includes.meta')

    <title>@yield('title')</title>

    {{-- all css link --}}
    @include('admin.includes.css')

  </head>

  <body>

    {{-- left sidebar --}}
    @include('admin.includes.sidebar')
    {{-- end left sidebar --}}

    {{-- header --}}
    @include('admin.includes.header')
    {{-- end header --}}

    {{-- right bar --}}
    {{-- @include('admin.includes.right_sidebar') --}}
    {{-- end right bar --}}

    {{-- main content --}}
    @yield('content')
    {{-- end main content --}}

    {{-- all js link --}}
    @include('admin.includes.js')
  </body>
</html>
