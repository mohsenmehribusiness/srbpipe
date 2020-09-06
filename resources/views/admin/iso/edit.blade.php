@extends('layouts.adminlayouts')

@section('title')
    ویرایش گوهینامه
@endsection

@section('head')
    <!-- head_me -->
@endsection

@section('head-content')
  ویرایش گواهینامه {{$record->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 order-md-1">
            {!! Form::model($record,['method'=>'PATCH','route'=>['iso.update',$record->id],'class'=>'needs-validation','files'=>true]) !!}
            {{csrf_field()}}
                    @include('partials.errors')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" style="padding-right:6px;">نام</label>
                    <a href="#namedemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                    <input class="form-control" name="name" id="name" type="text" value="{{ $record->name}}" required>
                    <div id="namedemo" class="collapse">
                        <br>
                        <div class="row">
                            <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;"><mark>اگر به هر دلیلی عکس لود نشود <abbr title="alt image">نام وارد شده</abbr> به جای آن چاپ خواهد شد</mark></div>
                            <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">اگر موس بر روی عکس رود <abbr title="title image">نام وارد شده</abbr> نمایش داده خواهد شد</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-6">
                    <label for="tag" style="padding-right:6px;">کلمات کلیدی</label>
                    <a href="#tagdemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                    <input class="form-control" name="tags" id="tag" rows="10" value="{{ $record->tags}}" maxlength="500" placeholder="کلمات کلیدی را وارد کنید(جدا کننده - می باشد)" required><br>
                    <div id="tagdemo" class="collapse">
                        <br>
                        <div class="row">
                            <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;"><mark>کلمات را با " - " از همدیگر جدا کنید</mark></div>
                            <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">کلمات کلیدی به جستجوی کاربر ها کمک میکند</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="img" style="padding-right:6px;">انتخاب عکس</label>
                    <input type="file" id="img" name="img" multiple>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="description" style="padding-right:6px;">توضیح مختصر در مورد عکس</label>
                    <textarea class="form-control" name="description" id="description" rows="4">
                        {{ $record->description}}
                    </textarea>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" style="margin-bottom:15px;" type="submit">ذخیره</button>
            {!! Form::close() !!}
        </div>
@endsection