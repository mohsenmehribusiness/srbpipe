<nav class="rtlrtl main-nav-outer" id="test" >
  <div class="rtlrtl container">
    <ul class="rtlrtl main-nav">
      <li id="logo_navv" class="rtlrtl small-logo"><a href="#header"><img src="<?= url('images/small_'.$about->logo) ?>" alt="{{$about->url}}"></a></li>
      <li><a class="sisco" href="#header" style="font-family: iransansweb_bold !important;" >خانه</a></li>
      @if($setting->section1 !="0")
        <li><a href="#service" style="font-family: iransansweb_bold !important;" >{{$setting->section1}}</a></li>
      @endif
      @if($setting->image !="0")
        <li><a href="#Portfolio" style="font-family: iransansweb_bold !important;" >گالری تصاویر</a></li>
      @endif
      @if($setting->map!="0")
        <li><a href="#client" style="font-family: iransansweb_bold !important;" >نقشه</a></li>
      @endif
      @if($setting->iso !="0")
        <li><a href="#team" style="font-family: iransansweb_bold !important;" >گواهینامه</a></li>
      @endif
      @if($setting->catalog !="0")
        <li><a href="#catalog" style="font-family: iransansweb_bold !important;" >کاتالوگ</a></li>
      @endif
      @if($setting->laboratory!="0")
        <li><a target="_blank" href="{{route('laboratory')}}" style="font-family: iransansweb_bold !important;" >{{$setting->laboratory}}</a></li>
      @endif
      @if($setting->product!="0")
        <li><a target="_blank" href="{{route('product')}}" style="font-family: iransansweb_bold !important;" >{{$setting->product}}</a></li>
      @endif
        <li><a href="#contact" style="font-family: iransansweb_bold !important;" >ارتباط با ما</a></li>
    </ul>
    <a class="rtlrtl res-nav_click" href="#"><i class="rtlrtl fa fa-bars"></i></a>
  </div>
</nav>