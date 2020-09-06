@extends('layouts.adminlayouts')

@section('head-content')
    <a class="btn btn-outline-success" href="{{ route('about.edit',['about'=>$about->id]) }}" >
        ویرایش اطلاعات سایت
    </a>
@endsection

@section('title')
    {{$about->title}}
@endsection

@section('head')
    <!-- head_me -->
    <!-- sweet-alert -->
    <script src="<?= Url('panel/js/sweetalert.min.js'); ?>"></script>
    <link href="<?= Url('panel/css/sweetalert.css'); ?>" rel="stylesheet">
    <!-- sweet-alert -->
    <style>
        .borderless{
            border-top-style: none;
            border-left-style: none;
            border-right-style: none;
            border-bottom-style: none;
        }
        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            border: none;
        }
        table.borderless td,table.borderless th{
            border: none !important;
        }
         span:hover{
             color:rgb(230,85,64);
         }
    </style>
@endsection

@section('content')
    @include('sweet::alert')
<div class="row">
    <div class="col-lg-12">
        <div class="row" style="direction: ltr;">
            <span style="color: lightgray;">
                <?php $v = new \Hekmatinasser\Verta\Verta($about->updatted_at);?>
                {!! Verta::persianNumbers($v); !!}
            </span>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col" style="text-align: center;">
                <img src="<?= url('/images/header_'.$about->logo) ?>" alt="{{$about->name}}" />
            </div>
            <div class="col"></div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="feather" style="margin-left:34px;margin-right:10px;"></span>
                    <span>مدیریت : </span>
                    <span>{{$about->manage}}</span>
                </div>
            </div>
           <div class="col">
               <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                   <span data-feather="monitor" style="margin-left:34px;margin-right:10px;"></span>
                   <span>{{$about->name}}</span>
               </div>
           </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="mail" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->email}}</span>
                </div>
            </div>
        </div>

        <div class="row" style="padding-top:15px;">
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="twitter" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->twitter}}</span>
                </div>
            </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="facebook" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->facebook}}</span>
                </div>
            </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="instagram" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->instagram}}</span>
                </div>
            </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="phone" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->phone}}</span>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="phone-incoming" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->mobile}}</span>
                </div>
            </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="printer" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->fax}}</span>
                </div>
            </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="navigation" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->telegram}}</span>
                </div>
            </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="hash" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->url}}</span>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 15px;">
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="tag" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->tags}}</span>
                </div>
            </div>
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="home" style="margin-left:34px;margin-right:10px;"></span>
                    <span>{{$about->address}}</span>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 15px;margin-bottom:20px;">
            <div class="col">
                <div style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <span data-feather="info" style="margin-left:34px;margin-right:10px;"></span>
                    <p class="text-justify">{{$about->about}}</p>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 15px;margin-bottom:20px;">
            <div class="col">
                <div class="row" style="background-color: lightgray;padding:8px;border-radius:3px;">
                    <div class="col">عکس صفحه اصلی</div>
                    <?php  $images = explode("#", $about->header); ?>
                    @foreach($images as $image)
                        <div class="col" style="margin:2px;">
                            <img style="max-height:100px;width: auto;" src="<?= url('/images/header_'.$image) ?>" alt="{{$about->name}}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row" style=margin-bottom:20px;padding-left:5px;padding-right:5px;padding-top:13px;padding-bottom:13px; ">
            <img style="width:auto;height: auto;" class="border" src="<?= url('/images/'.$about->map_img) ?>" alt="{{$about->map_link}}" />
        </div>
    </div>
</div>
@endsection
@section('body')
@endsection