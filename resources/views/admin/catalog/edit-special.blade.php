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
    تنظیم قسمت کاتالوگ
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 order-md-1">
        <form action="<?= Url('admin/catlog'); ?>" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
            @include('partials.errors')
            <div class="row" style="padding-top:35px;padding-bottom:35px;">
                <div class="col-md-12 mb-6">
                    <label for="description" style="padding-right:6px;">توضیح</label>
                    <textarea class="form-control" name="description" id="description" rows="4" >
                        {{$record->description}}
                    </textarea>
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
                            <div class="col-xs-4" style="padding-right:5px;padding-left:5px;">سایز عکس : 600 * 960 </div>
                            <div class="col-xs-4" style="padding-right:5px;padding-left:5px;">عکس عریض انتخاب شود</div>
                            <div class="col-xs-4" style="padding-right:5px;padding-left:5px;">در صورت انتخاب نکردن عکس از این قسمت عکس پیشفرض نمایش داده میشود.</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">ذخیره</button>
        </form>
    </div>
</div>
@endsection