<footer class="rtlrtl container">
  <section class="rtlrtl main-section contact" id="contact">
    <div class="rtlrtl row">
      <div class="rtlrtl col-lg-6 col-sm-7 wow fadeInLeft">
        <div class="rtlrtl contact-info-box phone clearfix">
          <h3><i class="rtlrtl fa fa-mobile"></i>موبایل:</h3>
          <span>{{$about->mobile}}</span>
        </div>
        <div class="rtlrtl contact-info-box phone clearfix">
          <h3><i class="rtlrtl fa fa-phone"></i>تلفن:</h3>
          <span>{{$about->phone}}</span>
        </div>
        <div class="rtlrtl contact-info-box email clearfix">
          <h3><i class="rtlrtl fa fa-pencil"></i>ایمیل:</h3>
          <span>{{$about->email}}</span>
        </div>
        <div class="rtlrtl contact-info-box email clearfix">
          <h3><i class="rtlrtl fa fa-telegram"></i>تلگرام:</h3>
          <span>{{$about->telegram}}</span>
        </div>
        <div class="rtlrtl contact-info-box email clearfix">
          <h3><i class="rtlrtl fa fa-user"></i>مدیریت:</h3>
          <span>{{$about->manage}}</span>
        </div>
        <div class="rtlrtl contact-info-box address clearfix">
          <h3>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            آدرس :</h3>
          <span>{{$about->address}}</span>
        </div>
        <div class="hidden">
          <h2 class="hidden"><a class="hidden" href="{{$about->url}}">{{$about->name}}</a> </h2>
        </div>
        <ul class="rtlrtl social-link">
          <li class="rtlrtl instagram"><a href="{{$about->instagram}}"><i class="rtlrtl fa fa-instagram"></i></a></li>
          <li class="rtlrtl telegram"><a href="{{$about->telegram}}"><i class="rtlrtl fa fa-telegram"></i></a></li>
          <li class="rtlrtl instagram"><a href=""><i class="rtlrtl fa fa-map"></i></a></li>
          <li class="rtlrtl gplus"><a href="mailto:{{$about->email}}"><i class="rtlrtl fa fa-google-plus"></i></a></li>
        </ul>
      </div>
      <div class="rtlrtl col-lg-6 col-sm-5 wow fadeInUp delay-05s">
        <div class="rtlrtl form">
          <div id="sendmessage">پیام شما ارسال شد ممنون</div>
          <div id="errormessage"></div>
          <form action="{{ route('contact_send') }}" method="POST">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div class="rtlrtl form-group">
              <input type="text" name="name" class="rtlrtl form-control input-text" id="name" placeholder="نام" required />
              <div class="rtlrtl validation"></div>
            </div>
            <div class="rtlrtl form-group">
              <input type="email" class="rtlrtl form-control input-text" name="email" id="email" placeholder="ایمیل" data-rule="email" data-msg="ایمیل نادرست!" required />
              <div class="rtlrtl validation"></div>
            </div>
            <div class="rtlrtl form-group">
              <textarea class="rtlrtl form-control input-text text-area" name="description" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="متن خود را بنویسید" required></textarea>
              <div class="rtlrtl validation"></div>
            </div>
            <div class="rtlrtl text-center"><button type="submit" class="rtlrtl input-btn">ارسال</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>
</footer>