@extends('layouts.home.homelayouts')

@section('body')
    <section style="padding-top:40px !important;" class="rtlrtl main-section" id="service">
        <div class="rtlrtl container">
            <h2>
                {{$laboratory->name}}
            </h2>
            <h6></h6>
            <div class="rtlrtl row">
                <figure class="rtlrtl col-lg-12 col-sm-12  text-right wow fadeInUp delay-02s">
                    <!-- slider section 1-->
                    <?php  $images = explode("#", $laboratory->img); ?>
                    <ul class="rslides box-shadow-right-bottom" id="slider1">
                        @foreach($images as $image)
                            <li><img src="<?= url('images/laboratory_'.$image) ?>" alt="{{$about->url}}"></li>
                        @endforeach
                    </ul>
                    <!-- slider section 1-->
                </figure>
            </div>
            <div class="row wow fadeInLeft delay-05s" style="margin-top:15px;margin-bottom:35px;">
                <p style="line-height:180%;color:black;text-align: justify;text-justify: inter-word;padding-left:9px;padding-right:9px;">
                    {{$laboratory->description}}
                </p>
            </div>
        </div>
        <div class="row wow fadeInLeft delay-09s" style="text-align: center;margin:0px !important;">
            <div class="col-xs-12">
                <a href="{{route('page_main')}}" class="btn btn-info">بازگشت به صفحه اصلی</a>
            </div>
        </div>
    </section>

    <!-- map -->
    @include('layouts.home.map')
    <!-- end map -->
    <!-- start - footer -->
    <!-- footer -->
    @include('layouts.home.footer')
    <!-- end - footer -->
@endsection

@section('script')
<!-- script button_gallery_more -->
    <script type="text/javascript">
        $('#button_gallery_more').remove();
    </script>
<!-- script button_gallery_more -->
@endsection


@section('tags')
    <?php  $tags = explode("-", $about->tags); ?>
    @foreach($tags as $tag)
        <meta name="keywords" content="{{$tag}}">
    @endforeach
    <link rel="canonical" href="{{$about->url}}" />
@endsection