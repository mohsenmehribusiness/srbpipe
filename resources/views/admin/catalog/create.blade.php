@extends('layouts.adminlayouts')

@section('head')
<!-- head_me -->
<!-- head_me -->
@endsection

@section('script')
@endsection

@section('title')
    کاتالوگ
@endsection

@section('head-content')
کاتالوگ
@endsection

@section('content')
<div class="row">
        <div class="col-md-8 order-md-1">
            <form class="needs-validation" novalidate action="{{route('catalog.store')}}" style="padding-bottom:25px;"  method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('partials.errors')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" style="padding-right:6px;">نام کاتالوگ</label>
                        <a href="#namedemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                        <input class="form-control" name="name" id="name" type="text" value="{{old('name')}}" required>
                        <div id="namedemo" class="collapse">
                            <br>
                            <div class="row">
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;"><mark>اگر به هر دلیلی کاتالوگ لود نشود <abbr title="alt image">نام وارد شده</abbr> به جای آن چاپ خواهد شد</mark></div>
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">اگر موس بر روی کاتالوگ رود <abbr title="title image">نام وارد شده</abbr> نمایش داده خواهد شد</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top:35px;padding-bottom:35px;">
                    <div class="col-md-12 mb-6">
                        <label for="img" style="padding-right:6px;">انتخاب عکس</label>
                        <a href="#catalog_img" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                        <input type="file" id="img" name="img">
                        <div id="catalog_img" class="collapse">
                            <br>
                            <div class="row">
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">سایز عکس : 105 * 105 </div>
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">در صورت انتخاب نکردن عکس از این قسمت عکس پیشفرض نمایش داده میشود.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top:35px;padding-bottom:35px;">
                    <div class="col-md-12 mb-6">
                        <label for="file" style="padding-right:6px;">وارد کردن فایل کاتالوگ</label>
                        <input type="file" id="file" name="file">
                    </div>
                </div>
                <div class="row" style="padding-top:35px;padding-bottom:35px;">
                    <div class="col-md-12 mb-6">
                        <label for="description" style="padding-right:6px;">توضیح مختصر</label>
                        <textarea class="form-control" name="description" id="description" rows="4" value="{{old('description')}}" ></textarea>
                    </div>
                </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">ذخیره</button>
          </form>
        </div>
</div>
@endsection