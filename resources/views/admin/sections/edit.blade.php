@extends('layouts.adminlayouts')

@section('title')
    ویرایش
@endsection

@section('head')
    <!-- head_me -->
@endsection

@section('head-content')
  ویرایش گواهینامه {{$section->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 order-md-1">
            {!! Form::model($section,['method'=>'PATCH','route'=>['section.update',$section->id],'class'=>'needs-validation','files'=>true]) !!}
            {{csrf_field()}}
                    @include('partials.errors')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" style="padding-right:6px;">نام</label>
                    <input class="form-control" name="name" id="name" type="text" value="{{ $section->name}}" required>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="description" style="padding-right:6px;">توضیح</label>
                    <textarea class="form-control" name="description" id="description" rows="4">
                        {{ $section->description}}
                    </textarea>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="list" style="padding-right:6px;">لیست</label>
                    <a href="#listdemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                    <div id="listdemo" class="collapse m-3">
                        <br>
                        <div class="row">
                            <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">دو جداکننده تعریف شده است : </div>
                            <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">جدا کننده اول :<span class="badge badge-info">$</span></div>
                            <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">جدا کننده دوم : <span class="badge badge-info">#</span></div>
                        </div>
                    </div>
                    <textarea class="form-control" name="list" id="list" rows="5">
                        {{ $section->list}}
                    </textarea>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="img" style="padding-right:6px;">انتخاب عکس</label>
                    <input type="file" id="img" name="img[]" multiple>
                </div>
            </div>
            <hr class="mb-5">
            <button class="btn btn-success btn-lg btn-block" style="margin-bottom:15px;" type="submit">ذخیره</button>
            {!! Form::close() !!}
        </div>
@endsection