@extends('layouts.adminlayouts')

@section('content')
    <!-- content_me -->
    <div class="p-6">
    <div class="row">
        <div class="col m-4">
            <div class="row">
                <div class="col border border-right-0 rounded-left"><i style="font-size:48px;color: rgb(87,200,242);" class="rtlrtl fa fa-bar-chart"></i><a href="" style="text-align: center;" class="p-4">بازدید سایت</a></div>
                <div class="p-3 col border border-bottom-0 border-left-0 border-right-0">
                    <span style="color: grey;text-align: center;">{{$count}}</span>
                </div>
            </div>
        </div>
        <div class="col m-4">
            <div class="row">
                <div class="col border border-right-0 rounded-left"><i style="font-size:48px;color: rgb(87,200,242);" class="rtlrtl fa fa-file-image-o"></i><a href="{{route('images.index')}}" style="text-align: center;" class="p-4">تصاویر</a></div>
                <div class="p-3 col border border-bottom-0 border-left-0 border-right-0">
                    <span style="color: grey;text-align: center;">{{$image_count}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col m-4">
            <div class="row">
                <div class="col border border-right-0 rounded-left"><i style="font-size:48px;color: rgb(87,200,242);" class="rtlrtl fa fa-th-large"></i><a href="{{route('iso.index')}}" style="text-align: center;" class="p-4">گواهینامه</a></div>
                <div class="p-3 col border border-bottom-0 border-left-0 border-right-0">
                    <span style="color: grey;text-align: center;">{{$iso_count}}</span>
                </div>
            </div>
        </div>
        <div class="col m-4">
            <div class="row">
                <div class="col border border-right-0 rounded-left"><i style="font-size:48px;color: rgb(87,200,242);" class="rtlrtl fa fa-pencil-square-o"></i><a href="{{route('send.index')}}" style="text-align: center;" class="p-4">ارتباطات</a></div>
                <div class="p-3 col border border-bottom-0 border-left-0 border-right-0">
                    <span style="color: grey;text-align: center;">{{$send_count}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 m-4" style="margin-right: 35px !important;">
            <div class="row">
                <div class="col border border-right-0 rounded-left"><i style="font-size:48px;color: rgb(87,200,242);" class="rtlrtl fa fa-book"></i><a href="{{route('catalog.index')}}" style="text-align: center;" class="p-4">کاتالوگ</a></div>
                <div class="p-3 col border border-bottom-0 border-left-0 border-right-0">
                    <span style="color: grey;text-align: center;">{{$catalog_count}}</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- content_me -->
@endsection

@section('head')
    <!-- head_me -->
    <link href="<?= Url('home/css/font-awesome.css" rel="stylesheet'); ?>" type="text/css">
    <!-- head_me -->
@endsection

@section('script')
     <!-- body_me -->
@endsection
