<!--main-section-end-->
<section class="rtlrtl main-section" id="catalog" style="background-image:url('<?= url("images/catalog_main".$catalogs[0]->img) ?>');min-height: 500px;background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
  <!--main-section client-part-start-->
  <div class="rtlrtl container">
    <b class="rtlrtl quote-right wow fadeInDown delay-03"></b>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="client-part-haead wow fadeInDown delay-05" style="text-align:center !important;">{{$catalogs[0]->name}}</h1>
        <p class="hidden-xs wow fadeInDown delay-05" style="line-height:6vw !important;font-size:20px !important;color:white !important;text-align:justify !important;">
          {{$catalogs[0]->description}}
        </p>
      </div>
    </div>
    <ul class="client wow fadeIn delay-05s">
      <?php $catalogs=$catalogs->forget(0) ?>
      @foreach($catalogs as $catalog)
      <li>
        <a href="<?= url('/catalog/'.$catalog->file) ?>" download>
          <img src="<?= url('/images/catalog_'.$catalog->img) ?>" alt="{{$about->name}}">
          <h3>{{$catalog->name}}</h3>
          <span></span>
        </a>
      </li>
        @endforeach
    </ul>
  </div>
</section>
<!--main-section client-part-end-->