<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
    <title>Dashboard @yield('page_title')</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin_assets/images/favicon.ico') }}" />
  
    @include('admin/includes/styling')
    
    {{-- Page Styles --}}
    @yield('page-style')
</head>

<body class="nav-md">

    @include('admin/includes/header')
    
    @yield('content')

    @include('admin/includes/footer')

    @include('admin/includes/script')
    
    {{-- Page Scripts --}}
    @yield('page-script')
</body>

</html>
