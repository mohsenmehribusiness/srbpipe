<section class="rtlrtl main-section paddind" id="Portfolio">
  <div class="rtlrtl container">
      <div class="row hidden-xs hidden-md hidden-sm" style="margin-bottom:20px !important;">
          <div class="col-xs-5"><hr></div>
          <div class="col-xs-2 text-center"><h2 class="text-center">گالری تصویر</h2></div>
          <div class="col-xs-5"><hr></div>
      </div>
      <h2 style="margin-bottom:30px !important;" class="hidden-lg">گالری تصویر</h2>
    <div class="rtlrtl portfolioFilter">
      <ul class="rtlrtl Portfolio-nav wow fadeIn delay-02s">
        <li><a href="#" data-filter="*" class="rtlrtl current">همه</a></li>
        <li><a href="#" data-filter=".branding">محصولات</a></li>
        <li><a href="#" data-filter=".webdesign">کارخانه</a></li>
        <li><a href="#" data-filter=".printdesign">طرح های اجرایی</a></li>
      </ul>
    </div>
  </div>
  <div class="rtlrtl portfolioContainer wow fadeInUp delay-04s">
    @foreach($images as $image)
        @if(str_contains($image->tags, 'محصول'))
          <div class="rtlrtl Portfolio-box branding box-shadow-right-bottom">
            <a href="<?= url('images/'.$image->img) ?>"><img src="<?= url('images/small_'.$image->img) ?>" alt="{{$about->url}}"></a>
            <h3>{{$image->name}}</h3>
            <p>محصول</p>
          </div>
        @elseif(str_contains($image->tags, 'طرح های اجرایی'))
          <div class="rtlrtl Portfolio-box printdesign box-shadow-right-bottom">
            <a href="<?= url('images/'.$image->img) ?>"><img src="<?= url('images/small_'.$image->img) ?>" alt="{{$about->url}}" ></a>
            <h3>{{$image->name}}</h3>
            <p>طرح های اجرایی</p>
          </div>
        @elseif(str_contains($image->tags, 'کارخانه'))
          <div class="rtlrtl Portfolio-box webdesign box-shadow-right-bottom">
            <a href="<?= url('images/'.$image->img) ?>"><img src="<?= url('images/small_'.$image->img) ?>" alt="{{$about->url}}"></a>
            <h3>{{$image->name}}</h3>
            <p>کارخانه</p>
          </div>
        @endif
    @endforeach
  </div>
  <div class="row" style="text-align: center;margin:0px !important;">
    <div class="col-xs-12">
        <a id="button_gallery_more" target="_blank" href="{{route('gallery')}}" class="btn btn-info">عکس های بیشتر</a>
    </div>
  </div>
</section>