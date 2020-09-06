@extends('layouts.adminlayouts')

@section('head')
<!-- head_me -->
<link href="<?= Url('panel/select/styles/multiselect.css'); ?>" rel="stylesheet">
<script src="<?= Url('panel/select/multiselect.min.js'); ?>"></script>
<!-- head_me -->
@endsection

@section('script')
@endsection

@section('head-content')
ویرایش اطلاعات سایت
@endsection

@section('content')
<div class="row">
        <div class="col-md-8 order-md-1">
            {!! Form::model($record,['method'=>'PATCH','route'=>['about.update',$record->id],'class'=>'needs-validation','files'=>true]) !!}
            {{csrf_field()}}
                @include('partials.errors')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">نام سایت</label>
                    <input class="inputcolor form-control" name="name" id="name" type="text" value="{{$record->name}}" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email">ایمیل</label>
                    <input class="inputcolor form-control" name="email" id="email" type="email" value="{{$record->email}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="instagram">اینستاگرام</label>
                    <input class="inputcolor form-control" name="instagram" id="instagram" type="text" value="{{$record->instagram}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fax">فکس</label>
                    <input class="inputcolor form-control" name="fax" id="fax" type="text" value="{{$record->fax}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="phone">تلفن ثابت</label>
                    <input class="inputcolor form-control" name="phone" id="phone" type="text" value="{{$record->phone}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobile">موبایل</label>
                    <input class="inputcolor form-control" name="mobile" id="mobile" type="text" value="{{$record->mobile}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="telegram">تلگرام</label>
                    <input class="inputcolor form-control" name="telegram" id="telegram" type="text" value="{{$record->telegram}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="url">آدرس سایت</label>
                    <input class="inputcolor form-control" name="url" id="url" type="text" value="{{$record->url}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="twitter">توییتر(twitter)</label>
                    <input class="inputcolor form-control" name="twitter" id="twitter" type="text" value="{{$record->twitter}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="facebook">فیسبوک(facebooks)</label>
                    <input class="inputcolor form-control" name="facebook" id="facebook" type="text" value="{{$record->facebook}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="manage">مدیریت</label>
                    <input class="inputcolor form-control" name="manage" id="manage" type="text" value="{{$record->manage}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title">عنوان سایت</label>
                    <input class="inputcolor form-control" name="title" id="title" type="text" value="{{$record->title}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-6">
                    <label for="address">آدرس</label>
                    <textarea class="inputcolor form-control" name="address" id="address" rows="2">{{ $record->address}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-6">
                    <label for="tags" style="padding-top: 5px;">برچسب</label>
                    <a style="margin-right:15px;margin-left: 15px;" href="#tagdemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                    <textarea class="inputcolor form-control" name="tags" id="tags" rows="1">{{ $record->tags}}</textarea>
                </div>
                <div id="tagdemo" class="collapse">
                    <br>
                    <div class="row"style="padding:15px;padding-right:50px;">
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;"><mark>نکته بسیار مهم : کلمات کلیدی را با <abbr title="جداکننده">"-"</abbr> از یکدیگر جدا کنید </mark></div>
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;">مثال : کلمه کلیدی اول - کلمه کلیدی دوم - کلمه کلیدی سوم</div>
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;">این قسمت بیشتر برای <abbr title="مثل google,yahoo,bing ...">موتور های جستجو</abbr> در نظر گرفته شده است </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="about" style="padding-right:6px;">توضیح کلی در مورد سایت</label>
                    <a style="margin-right:15px;margin-left: 15px;" href="#aboutdemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                    <textarea class="inputcolor form-control" name="about" id="about" rows="6">{{ $record->about}}</textarea>
                </div>
                <div id="aboutdemo" class="collapse">
                    <br>
                    <div class="row"style="padding:15px;padding-right:50px;">
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;">توضیح تا حد امکان کوتاه باشد</div>
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;"> حدالامکان، تعداد کاراکتر های متن توضیحات کمتر از 76 کاراکتر باشد</div>
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;">ممکن است در زمان جستجو در گوگل این توضیح نمایش داده شود</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="map_link">وارد کردن لینک نقشه</label>
                    <input class="inputcolor form-control" name="map_link" id="map_link" type="text" value="{{$record->map_link}}" required>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="map_imgg" style="padding-right:6px;">عکس نقشه</label>
                    <a style="margin-right:15px;margin-left: 15px;" href="#map_img" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                    <input type="file" id="map_imgg" name="map_img">
                </div>
                <div id="map_img" class="collapse">
                    <br>
                    <div class="row"style="padding:15px;padding-right:50px;">
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;">سایز عکس : 1400 * 400</div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="logo" style="padding-right:6px;">انتخاب لوگوی شرکت</label>
                    <a style="margin-right:15px;margin-left: 15px;" href="#imagedemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                    <input type="file" id="logo" name="logo">
                </div>
                <div id="imagedemo" class="collapse">
                    <br>
                    <div class="row"style="padding:15px;padding-right:50px;">
                        <div class="col-xs-12" style="padding-right: 15px;padding-left: 15px;padding-top: 8px;">عکس را حتما با پسوند<abbr title="این نوع عکس پشت زمینه ندارد">"png"</abbr>وارد کنید</div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="logo" style="padding-right:6px;">انتخاب عکس صفحه اصلی</label>
                    <input type="file" id="header" name="header[]" multiple>
                </div>
            </div>
                <hr class="mb-4">
                <button class="btn btn-success btn-lg btn-block my-2" type="submit">اعمال ویرایش</button>
            {!! Form::close() !!}
        </div>
</div>
@endsection