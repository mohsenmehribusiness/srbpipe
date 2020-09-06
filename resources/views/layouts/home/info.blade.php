<section class="rtlrtl main-section alabaster">
  <div class="rtlrtl container">
    <div class="rtlrtl row">
      <figure class="rtlrtl col-lg-5 col-sm-4 wow fadeInLeft" >
        <!-- slider section 1-->
          <?php  $images = explode("#", $section[1]->img); ?>
        <ul class="rslides" id="slider3">
          @foreach($images as $image)
            <li><img src="<?= url('images/section_'.$image) ?>" alt="{{$about->url}}"></li>
          @endforeach
        </ul>
        <!-- slider section 1-->
      </figure>
      <div class="rtlrtl col-lg-7 col-sm-8 featured-work">
        <h2 class="wow fadeInLeft">{{$section[1]->name}}</h2>
        <P class="rtlrtl padding-b wow fadeInLeft" style="line-height:180%;color:black;text-align: justify !important;">
          {{$section[1]->description}}
        </P>
        <!-- list -->
          <?php $lists = explode("$", $section[1]->list);  ?>
        @foreach($lists as $list)
              <?php  $listies = explode("#", $list);  ?>
          <div class="rtlrtl featured-box">
            <div class="rtlrtl featured-box-col1 wow fadeInRight delay-02s">
              <i class="rtlrtl fa fa-check"></i>
            </div>
            <div class="rtlrtl featured-box-col2 wow fadeInRight delay-02s">
              <h3>
                {{array_shift($listies)}}
              </h3>
              @foreach($listies as $listie)
                <p><i style="margin-left:5px;margin-right:3px;color: black;" class="rtlrtl fa fa-check"></i>
                  {{$listie}}
                </p>
              @endforeach
            </div>
          </div>
      @endforeach
      <!-- list -->
      </div>
    </div>
  </div>
</section>