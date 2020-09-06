@extends('layouts.adminlayouts')

@section('title')
    تنظیم سایت
@endsection

@section('head-content')
تنظیم صفحه اصلی سایت
@endsection

@section('head')
    <!-- sweet-alert -->
    <script src="<?= Url('panel/js/sweetalert.min.js'); ?>"></script>
    <link href="<?= Url('panel/css/sweetalert.css'); ?>" rel="stylesheet">
    <!-- sweet-alert -->
    <style>
        .numbertable
        {
            width:3%;
        }
        .modal-body{
            height: 250px;
            overflow-y: auto;
        }
        @media (min-height: 500px) {
            .modal-body { height: 400px; }
        }

        @media (min-height: 800px) {
            .modal-body { height: 600px; }
        }
    </style>
    <!-- head_me -->
@endsection

@section('content')
    @include('sweet::alert')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($sections as $section)
                    <div class="col-12" id="{{$section->id}}_alert">
                    <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p class="mb-0 text" style="text-align: center;">
                            {{$section->name}}
                        </p>
                        <div class="custom-control custom-checkbox">
                            <input onclick="section({{$section->id}})" type="checkbox" class="custom-control-input" id="{{$section->id}}" @if($section->state=="0") checked @endif >
                            <label class="custom-control-label" for="{{$section->id}}">درج شود</label>
                        </div>
                        <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                            <a href="{{ route('section.edit' , ['id' => $section->id]) }}" type="button" title="ویرایش" class="btn btn-sm btn-outline-warning mx-1">
                                <span data-feather="edit"></span>
                                ویرایش
                            </a>
                            <a href="{{ route('section.show' , ['id' => $section->id]) }}" type="button" title="ویرایش" class="btn btn-sm btn-outline-info mx-1">
                                <span data-feather="info"></span>
                                مشاهده
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        section=function (){
        }
    </script>
@endsection