<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  @include('layout.css-placed')
</head>
<body class="hold-transition skin-blue sidebar-mini-fixed fixed">
<div class="wrapper">

    @include('layout.header')

    @yield('content')

    @include('layout.footer')

</div>
</body>
<!-- ./wrapper -->
  @include('layout.js-placed')
</html>
