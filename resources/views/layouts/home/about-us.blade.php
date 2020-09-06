<section style="padding-top:40px !important;" class="rtlrtl main-section" id="service">
  <div class="rtlrtl container">
    <h2>درباره ما</h2>
    <h6></h6>
    <div class="row wow fadeInLeft delay-05s" style="margin-top:15px;margin-bottom:35px;">
      <p style="line-height:180%;color:black;text-align: justify;text-justify: inter-word;padding-left:9px;padding-right:9px;">
        {{$section[0]->description}}
      </p>
    </div>
    <div class="rtlrtl row">
      <div class="rtlrtl col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
        <!-- foreach -->
        <!-- list -->
          <?php $lists = explode("$", $section[0]->list); $icons=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18"];  ?>
        @foreach($lists as $list)
          <?php  $listies = explode("#", $list);  ?>
          <div class="rtlrtl service-list">
          <div class="rtlrtl service-list-col1">
            <img src="<?= url('images/icon-pipe/'.array_shift($icons).'.png') ?>" alt="{{$about->url}}" />
          </div>
          <div class="rtlrtl service-list-col2">
            <h3>
              {{array_shift($listies)}}
            </h3>
            @foreach($listies as $listie)
              <p style="text-align: justify !important;" ><i style="margin-left:5px;margin-right:3px;color:black;" class="rtlrtl fa fa-check"></i>
                {{$listie}}
              </p>
            @endforeach
          </div>
        </div>
        @endforeach
          <!-- list -->
        <!-- foreach -->
      </div>
      <figure class="rtlrtl col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
        <!-- slider section 1-->
        <?php  $images = explode("#", $section[0]->img); ?>
        <ul class="rslides box-shadow-right-bottom" id="slider1">
          @foreach($images as $image)
            <li><img src="<?= url('images/section_'.$image) ?>" alt="{{$about->url}}"></li>
          @endforeach
        </ul>
        <!-- slider section 1-->
      </figure>
    </div>
  </div>
</section>
