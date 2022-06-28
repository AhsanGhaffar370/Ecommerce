<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
    <title>Ecommerce @yield('page_title')</title>
    
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front_assets/images/favicon.png') }}" />
  
    @include('front/includes/styling')
    
    {{-- Page Styles --}}
    @yield('page-style')
</head>

<body class="bg-white">

    @include('front/includes/header')

    @yield('content')

    @include('front/includes/footer')

    @include('front/includes/script')
    
    {{-- Page Scripts --}}
    @yield('page-script')
</body>

</html>
