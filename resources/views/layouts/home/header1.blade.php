<header class="rtlrtl" id="header">
  <ul class="rslides" id="slider33">
      <?php  $images = explode("#", $about->header); ?>
    @foreach($images as $image)
          <li>
            <img src="<?= url('/images/header_'.$image) ?>" alt="{{$about->url}}" style=" filter: blur(5px);" >
            <div class="centered-textimage hidden-xs hidden-md hidden-sm">
              <figure class="rtlrtl logo animated fadeInDown delay-07s">
                <a class="rtlrtl animated delay-1s servicelink" href="#service"><img src="<?= url('images/header_'.$about->logo) ?>" alt="{{$about->url}}"></a>
              </figure>
              <a class="rtlrtl link animated fadeInUp delay-1s servicelink" href="#service">
                <h1 id="hoaver-me" style="font-family: iransansweb_bold" class="rtlrtl animated fadeInDown delay-07s">
                  {{$about->name}}
                </h1>
              </a>
            </div>
            <div class="centered-textimage hidden-lg">
              <figure class="rtlrtl logo animated fadeInDown delay-07s">
                <a class="rtlrtl animated delay-1s servicelink" href="#service"><img src="<?= url('images/header_'.$about->logo) ?>" alt="{{$about->url}}"></a>
              </figure>
              <a class="rtlrtl link animated fadeInUp delay-1s servicelink" style="padding-left:2px;padding-right: 2px;" href="#service">
                <h1 class="rtlrtl animated fadeInDown delay-07s" style="font-size:4vw !important;margin-top:0px;text-align: center;">
                  {{$about->name}}
                </h1>
              </a>
            </div>
          </li>
    @endforeach
  </ul>
</header>