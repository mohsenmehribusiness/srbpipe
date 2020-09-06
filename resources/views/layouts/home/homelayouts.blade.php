<!doctype html>
<html lang="fa-IR">
<head>
  <meta http-equiv=”Content-Type” charset="UTF-8">
  <meta http-equiv=”content-language” content=”fa” />
  <meta name="viewport" content="width=device-width,maximum-scale=1">
  <title>{{$about->title}}</title>
  <link rel="icon" href="<?= url('/images/header_'.$about->logo) ?>" />
  <!-- meta tag geo -->
  <!-- iran -->
  <meta name="geo.region" content="IR" />
  <meta name="geo.position" content="32.427908;53.688046" />
  <meta name="ICBM" content="32.427908, 53.688046" />
  <!-- iran -->
  <!-- North Khorasan Province -->
  <meta name="geo.region" content="IR" />
  <meta name="geo.position" content="37.471035;57.101319" />
  <meta name="ICBM" content="37.471035, 57.101319" />
  <!-- North Khorasan Province -->
  <!-- bojnurd -->
  <meta name="geo.region" content="IR" />
  <meta name="geo.placename" content="Bojnurd" />
  <meta name="geo.position" content="37.470206;57.314335" />
  <meta name="ICBM" content="37.470206, 57.314335" />
  <!-- bojnurd -->
  <!-- کارخانه لوله پلی اتیلن سیال رسان بجنورد -->
  <meta name="geo.region" content="IR" />
  <meta name="geo.position" content="37.473016;57.256904" />
  <meta name="ICBM" content="37.473016, 57.256904" />
  <!-- کارخانه لوله پلی اتیلن سیال رسان بجنورد -->
  <!-- meta tag geo -->
  <!-- tags -->
  <meta name="keywords" content="{{$about->name}}">
  <meta name="keywords" content="{{$about->url}}">
  <meta name="description" content="{{$about->about}}">
  @yield('tags')
  <!-- tags -->
  <link rel="stylesheet" href="<?= Url('index1.css'); ?>" >
  <script src="<?= Url('index1.js'); ?>"></script>
  <link rel="stylesheet" href="<?= Url('index2.css'); ?>" >
  <script src="<?= Url('index2.js'); ?>"></script>
  <link rel="stylesheet" href="<?= Url('index3.css'); ?>" >
  <link rel="stylesheet" href="<?= Url('fonts/font.css'); ?>" >
</head>
<body>
@include('sweet::alert')
@yield('body')
<script src="home/js/endjs.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        var width = screen.width;
        /* 992 > width > 767 */
        width=parseInt(width);
        if( width > 767 && width < 992)
        {
            $('ul li a').each(function () {
                $(this).css("margin", "8px 0px");
            });
            $('ul li a').each(function () {
                $(this).css("margin", "4px 0px");
            });
            $('#logo_navv').remove();
        }
    });
</script>
@yield('script')
</body>
</html>