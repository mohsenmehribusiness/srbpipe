@extends('layouts.adminlayouts')

@section('head')
<!-- head_me -->
<link href="<?= Url('panel/select/styles/multiselect.css'); ?>" rel="stylesheet">
<script src="<?= Url('panel/select/multiselect.min.js'); ?>"></script>
<script src="<?= Url('panel/js/ckeditor-5-classic.js'); ?>"></script>
<!-- head_me -->
@endsection

@section('script')
@endsection

@section('head-content')
    ویرایش قسمت {{$record->name}}
@endsection

@section('title')
     {{$record->name}}
@endsection


@section('content')
<div class="row">
        <div class="col-md-8 order-md-1">
            @include('partials.errors')
            {!! Form::model($record,['method'=>'PATCH','route'=>['product.update',$record->id],'class'=>'needs-validation','enctype'=>'multipart/form-data']) !!}
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">نام</label>
                    <input class="inputcolor form-control" name="name" id="name" type="text" value="{{$record->name}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-6">
                    <label for="description">توضیحات</label>
                    <textarea class="inputcolor form-control" name="description" id="description" rows="2">{{ $record->description}}</textarea>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="img" style="padding-right:6px;">انتخاب عکس</label>
                    <input type="file" id="img" name="img[]" multiple>
                    <a href="#imgdemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                </div>
                <div id="imgdemo" class="collapse ml-5 mr-5 pr-5 pl-5">
                    <br>
                    <div class="row">
                        <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">سایز عکس :<mark>800 * 400</mark></div>
                    </div>
                </div>
            </div>
                <hr class="mb-4">
                <button class="btn btn-success btn-lg btn-block my-2" type="submit">اعمال ویرایش</button>
            {!! Form::close() !!}
        </div>
</div>
@endsection