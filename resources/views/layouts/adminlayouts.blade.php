<!doctype html>
<html lang="en" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex,nofollow,NoYdir,NoSnippet,NoImageIndex,noodp" />
  <meta name=”googlebot” content=”noarchive” />
  <title>
    @yield('title')
  </title>
  <link href="<?= Url('panel/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?= Url('panel/css/dash.css'); ?>" rel="stylesheet">
  <link href="<?= Url('fonts/font.css'); ?>" rel="stylesheet">
  <!-- special head -->
@yield('head')
  <!-- special head -->
</head>
<body>
<div class="header_progress sticky-top">
  <div class="progress-container_progress">
    <div class="progress-bar_progress" id="myBar"></div>
  </div>
</div>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-sm-3  col-md-2 mr-0" href="#">موبایل</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <form  action="{{route('logout')}}" method="post">
      {!!  csrf_field() !!}
        <button id="logoutt" class="btn btn-outline-light" type="submit">خروج</button>
      </form>
    </li>
  </ul>
</nav>
<!-- -->
<div class="container-fluid">
  <div class="row">
    @include('layouts.nav-right')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h3">
          @yield('head-content')
        </h1>
      </div>
      @yield('content')
    </main>
  </div>
</div>
<script src="<?= Url('panel/js/jquery-3.2.1.slim.min.js'); ?>"></script>
<script src="<?= Url('panel/js/popper.min.js'); ?>"></script>
<script src="<?= Url('panel/js/bootstrap.min.js'); ?>"></script>
<script src="<?= Url('panel/js/feather.min.js'); ?>"></script>
<script>
    feather.replace()
    logout=function () {
        var ll=$('#logoutt').html();
        ll.submit()
    }
</script>
@yield('script')
</body>
</html>