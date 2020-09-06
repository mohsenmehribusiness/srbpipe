@extends('layouts.adminlayouts')

@section('head')
<!-- head_me -->
<!-- head_me -->
@endsection

@section('script')
@endsection

@section('head-content')
اضافه کردن عکس به گالری سایت
@endsection

@section('content')
<div class="row">
        <div class="col-md-8 order-md-1">
            <form class="needs-validation" novalidate action="{{route('images.store')}}" style="padding-bottom:25px;"  method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('partials.errors')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" style="padding-right:6px;">نام</label>
                        <a href="#namedemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                        <input class="form-control" name="name" id="name" type="text" value="{{old('name')}}" required>
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
                        <input class="form-control" name="tags" id="tag" rows="10" value="{{old('tags')}}" maxlength="500" placeholder="کلمات کلیدی را وارد کنید(جدا کننده - می باشد)" required><br>
                        <div id="tagdemo" class="collapse">
                            <br>
                            <div class="row">
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;"><mark>کلمات را با " - " از همدیگر جدا کنید</mark></div>
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">کلمات کلیدی به جستجوی کاربر ها کمک میکند</div>
                                <div class="col-xs-4 mt-3" style="padding-right: 5px;padding-left: 5px;">در این قسمت حتما یکی از دسته ها ( محصولات - کارخانه - طرح های اجرایی ) را وارد کنید</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top:35px;padding-bottom:35px;">
                    <div class="col-md-12 mb-6">
                        <label for="img" style="padding-right:6px;">انتخاب عکس</label>
                        <input type="file" id="img" name="img">
                        <a href="#imageedemo" class="btn badge badge-info" data-toggle="collapse">توضیح</a>
                        <div id="imageedemo" class="collapse">
                            <br>
                            <div class="row">
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">عکس اصلی با سایز اصلی ذخیره میشود</div>
                                <div class="col-xs-4" style="padding-right: 5px;padding-left: 5px;">اما برای صفحه اصلی از همین عکس ، عکسی در ابعاد 360 * 270 ذخیره میشود</div>
                                <div class="col-xs-12 mt-3" style="padding-right: 5px;padding-left: 5px;">اگر کاربر بر  روی عکس کوچک کلیک کند، عکس با ابعاد اصلی نمایش داده خواهد شد.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top:35px;padding-bottom:35px;">
                    <div class="col-md-12 mb-6">
                        <label for="description" style="padding-right:6px;">توضیح مختصر در مورد عکس</label>
                        <textarea class="form-control" name="description" id="description" rows="4" value="{{old('description')}}" ></textarea>
                    </div>
                </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">ذخیره</button>
          </form>
        </div>
</div>
@endsection