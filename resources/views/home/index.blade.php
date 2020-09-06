@extends('layouts.home.homelayouts')

@section('tags')
    <?php  $tags = explode("-", $about->tags); ?>
    @foreach($tags as $tag)
        <meta name="keywords" content="{{$tag}}">
    @endforeach
@endsection

@section('body')
    <!-- start header -->
    <!-- header -->
    @include('layouts.home.header1')
    <!--header-end-->
    <!-- start nav -->
    @include('layouts.home.nav')
    <!-- end nav -->
    <!-- start about-us -->
    @if($setting->section1 !="0")
        @include('layouts.home.about-us')
    @endif
    <!-- end about-us -->
    <!-- start info -->
    @if($setting->section2 !="0")
        @include('layouts.home.info')
    @endif
    <!-- end info -->
    <!-- start - gallery -->
    @if($setting->image !="0")
        @include('layouts.home.gallery')
    @endif
    <!-- end - gallery -->
    <!-- start catalog -->
    @if($setting->catalog !="0")
        @include('layouts.home.catalog0')
    @endif
    <!-- end catalog -->
    <!-- start iso -->
    @if($setting->iso !="0")
        @include('layouts.home.iso')
    @endif
    <!-- end iso -->
    <!-- start map -->
    <!-- map -->
    @if($setting->map !="0")
        @include('layouts.home.map')
    @endif
    <!-- end map -->
    <!-- start - footer -->
    <!-- footer -->
    @include('layouts.home.footer')
    <!-- end - footer -->
@endsection