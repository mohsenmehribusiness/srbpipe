@extends('layouts.adminlayouts')

@section('head')
<!-- head_me -->
<link href="<?= Url('panel/select/styles/multiselect.css'); ?>" rel="stylesheet">
<script src="<?= Url('panel/select/multiselect.min.js'); ?>"></script>
<!-- head_me -->
@endsection

@section('title')
    پاسخ مدیر
@endsection

@section('script')
@endsection

@section('head-content')
    پاسخ مدیر
@endsection

@section('content')
<div class="row">
        <div class="col-md-8" id="{{$send->id}}_alert">
            <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h5 class="alert-heading">
                    <span data-feather=""></span>
                    </h5>
                <p class="mb-0 text text-justify">
                    <img  src="<?= Url('icon-header.png'); ?>" >
                    <span class="text-success px-1">{{$send->name}}</span>
                    {{$send->description}}
                </p>
                <div style="float: left;margin:5px;">
                  <span class="text-secondary"  style="opacity:0.3;">
                        <?php $v = new \Hekmatinasser\Verta\Verta($send->updated_at);?>
                    {!! $v->format('%B %d، %Y'); !!}
                   </span>
                     -
                   <span class="text-secondary"  style="opacity:0.3;">
                        {{$send->email}}
                   </span>
                </div>
            </div>
        </div>
        <div class="col-md-8 order-md-1">
            {!! Form::model($send,['method'=>'PATCH','route'=>['send.update',$send->id],'class'=>'needs-validation']) !!}
            {{csrf_field()}}
                @include('partials.errors')
                    <input type="hidden" name="send_id" value="{{$send->id}}">
                <div class="row" style="padding-top:35px;padding-bottom:35px;">
                    <div class="col-md-12 mb-6">
                        <textarea class="form-control" name="description" placeholder="پاسخ خود را بنویسید" id="description" rows="6" value="{{old('description')}}" ></textarea>
                    </div>
                </div>
                <hr class="mb-2">
                <button class="btn btn-success btn-lg btn-block mb-15" type="submit">ارسال به شخص</button>
            {!! Form::close() !!}
        </div>
@endsection