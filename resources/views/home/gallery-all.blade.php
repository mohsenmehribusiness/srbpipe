@extends('layouts.home.homelayouts')

@section('body')
    <!-- start nav -->
    <!-- nav -->
    <!-- end nav -->
    <!-- iso -->
    @include('layouts.home.gallery')
    <!-- end iso -->
    <!-- start map -->
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