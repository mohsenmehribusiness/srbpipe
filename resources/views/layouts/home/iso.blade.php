<section class="rtlrtl main-section team" id="team">
  <div class="rtlrtl container">
    <div class="row hidden-xs hidden-md hidden-sm" style="margin-bottom:20px !important;">
      <div class="col-xs-5"><hr></div>
      <div class="col-xs-2 text-center"><h2 class="text-center">گواهینامه</h2></div>
      <div class="col-xs-5"><hr></div>
    </div>
    <h2 style="margin-bottom:30px !important;" class="hidden-lg">گواهینامه</h2>
    <div class="rtlrtl team-leader-block clearfix">
      @foreach($certificates as $certificate)
        <div class="rtlrtl team-leader-box">
          <div class="rtlrtl team-leader wow fadeInDown delay-03s">
            <div class="rtlrtl team-leader-shadow printdesign"><a href="<?= url('images/'.$certificate->img) ?>" ></a></div>
            <img class="box-shadow-right-bottom" src="imagesi/iso1.jpg" alt="">
            <img class="box-shadow-right-bottom" src="<?= url('images/small_'.$certificate->img) ?>" alt="{{$about->url}}">
            <ul>
            </ul>
          </div>
          <h3 class="rtlrtl wow fadeInDown delay-03s">{{$certificate->name}}</h3>
          <p class="rtlrtl wow fadeInDown delay-03s" style="text-align: justify !important;">{{$certificate->description}}</p>
        </div>
      @endforeach
      </div>
    <div class="row" style="text-align: center;">
      <div class="col-xs-12">
        <a id="button_iso_more" target="_blank" href="{{route('iso')}}" class="btn btn-info">گواهینامه های بیشتر</a>
      </div>
    </div>
  </div>
</section>