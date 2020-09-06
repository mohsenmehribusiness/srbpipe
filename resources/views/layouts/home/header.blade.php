<header class="rtlrtl header" @if($about->header) style="background:url(<?= url('images/header_'.$about->header) ?>) right top repeat;" @endif id="header">
  <div class="rtlrtl container">
    <figure class="rtlrtl logo animated fadeInDown delay-07s">
      <a class="rtlrtl animated delay-1s servicelink" href="#service"><img src="<?= url('images/header_'.$about->logo) ?>" alt="{{$about->url}}" ></a>
    </figure>
    <a class="rtlrtl link animated fadeInUp delay-1s servicelink" href="#service">
      <h1 class="rtlrtl animated fadeInDown delay-07s">
        {{$about->name}}
      </h1>
    </a>
    <ul class="rtlrtl we-create animated fadeInUp delay-1s">
      <li>اولین و تنها تولید کننده لوله های پلی اتیلن در خراسان شمالی</li>
    </ul>
  </div>
</header>