@extends('layouts.adminlayouts')

@section('title')
    تنظیم سایت
@endsection

@section('head-content')
تنظیمات کلی سایت
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
    <!-- ajax -->
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <!-- ajax -->
@endsection

@section('content')
    @include('sweet::alert')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($sections as $section)
                    <!-- alert -->
                    <div class="col-12" id="{{$section->id}}_alert">
                        <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h4 class="mb-0 text" style="text-align: center;">
                            {{$section->name}}
                        </h4>
                        <div class="custom-control">
                            <button  @if($section->id=="1") name="section1" onclick="settingg('section1')" @else name="section2" onclick="settingg('section2')" @endif @if($section->id=="1") @if($setting->section1!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;" @else class="btn btn-sm btn-outline-danger" id="zero" @endif @elseif($section->id=="2") @if($setting->section2!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;"  @else class="btn btn-sm btn-outline-danger" id="zero" @endif @endif  >
                                <span  data-feather="check-square"></span>
                            </button>
                        </div>
                        <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                            <a href="{{ route('section.edit' , ['id' => $section->id]) }}" type="button" title="ویرایش" class="btn btn-sm btn-outline-warning mx-1">
                                <span data-feather="edit"></span>
                                ویرایش
                            </a>
                            <a data-target="#{{$section->id}}_modal" data-toggle="modal"  type="button" class="btn btn-sm btn-outline-info mx-1">
                                <span data-feather="info"></span>
                                مشاهده
                            </a>
                        </div>
                    </div>
                    </div>
                    <!-- end - alert -->
                    <!-- show -->
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="{{$section->id}}_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$section->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5>تصاویر</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php  $images = explode("#", $section->img); ?>
                                            @foreach($images as $image)
                                                <div class="col-xs-6" style="margin-top:2px;margin-bottom:2px;margin-left: 2px;margin-right:2px;">
                                                    <a href="<?= url('images/section_'.$image) ?>"><img style="width:200px;height:auto;" src="<?= url('images/section_'.$image) ?>" alt=""></a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h5>توضیح</h5>
                                                <p class="text-justify">
                                                    {{$section->description}}
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h5>لیست</h5>
                                                <?php
                                                $lists = explode("$", $section->list);
                                                ?>
                                                <span data-feather="check"></span>
                                                @foreach($lists as $list)
                                                        <?php
                                                        $listies = explode("#", $list);
                                                        ?>
                                                        <span data-feather="check"></span>
                                                        @foreach($listies as $listie)
                                                            <span style="margin-right:8px;">
                                                                {{$listie}}
                                                            </span>
                                                            <br><span style="margin-right:8px;" data-feather="check"></span>
                                                        @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">بستن</button>
                                        <a href="{{ route('section.edit' , ['id' => $section->id]) }}" type="button" class="btn btn-outline-warning">ویرایش</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end show -->
                @endforeach
                <!-- laboratory -->
                    <!-- alert -->
                    <div class="col-12" id="{{$laboratory->id}}_alert">
                        <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="mb-0 text" style="text-align: center;">
                                {{$laboratory->name}}
                            </h4>
                            <div class="custom-control">
                                <button name="laboratory" onclick="settingg('laboratory')"  @if($setting->laboratory!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;" @else class="btn btn-sm btn-outline-danger" id="zero" @endif >
                                    <span  data-feather="check-square"></span>
                                </button>
                            </div>
                            <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                                <a href="{{ route('laboratory.edit' , ['id' => $laboratory->id]) }}" type="button" title="ویرایش" class="btn btn-sm btn-outline-warning mx-1">
                                    <span data-feather="edit"></span>
                                    ویرایش
                                </a>
                                <a data-target="#{{$laboratory->id}}_modal_laboratory" data-toggle="modal"  type="button" class="btn btn-sm btn-outline-info mx-1">
                                    <span data-feather="info"></span>
                                    مشاهده
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end - alert -->
                    <!-- show -->
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="{{$laboratory->id}}_modal_laboratory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$laboratory->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5>تصاویر</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php  $images = explode("#", $laboratory->img); ?>
                                        @foreach($images as $image)
                                            <div class="col-xs-6" style="margin-top:2px;margin-bottom:2px;margin-left: 2px;margin-right:2px;">
                                                <a href="<?= url('images/laboratory_'.$image) ?>"><img style="width:200px;height:auto;" src="<?= url('images/laboratory_'.$image) ?>" alt=""></a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h5>توضیح</h5>
                                            <p class="text-justify">
                                                {{$laboratory->description}}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">بستن</button>
                                    <a href="{{ route('laboratory.edit' , ['id' => $laboratory->id]) }}" type="button" class="btn btn-outline-warning">ویرایش</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end show -->
                <!-- laboratory -->
                <!-- product -->
                    <!-- alert -->
                    <div class="col-12" id="{{$product->id}}_alert_pro">
                        <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="mb-0 text" style="text-align: center;">
                                {{$product->name}}
                            </h4>
                            <div class="custom-control">
                                <button name="product" onclick="settingg('product')" @if($setting->product!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;" @else class="btn btn-sm btn-outline-danger" id="zero" @endif >
                                    <span  data-feather="check-square"></span>
                                </button>
                            </div>
                            <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                                <a href="{{ route('product.edit' , ['id' => $product->id]) }}" type="button" title="ویرایش" class="btn btn-sm btn-outline-warning mx-1">
                                    <span data-feather="edit"></span>
                                    ویرایش
                                </a>
                                <a data-target="#{{$product->id}}_modal_pro" data-toggle="modal"  type="button" class="btn btn-sm btn-outline-info mx-1">
                                    <span data-feather="info"></span>
                                    مشاهده
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end - alert -->
                    <!-- show -->
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="{{$product->id}}_modal_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5>تصاویر</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php  $images = explode("#", $product->img); ?>
                                        @foreach($images as $image)
                                            <div class="col-xs-6" style="margin-top:2px;margin-bottom:2px;margin-left: 2px;margin-right:2px;">
                                                <a href="<?= url('images/product_'.$image) ?>"><img style="width:200px;height:auto;" src="<?= url('images/product_'.$image) ?>" alt=""></a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h5>توضیح</h5>
                                            <p class="text-justify">
                                                {{$product->description}}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">بستن</button>
                                    <a href="{{ route('product.edit' , ['id' => $product->id]) }}" type="button" class="btn btn-outline-warning">ویرایش</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end show -->
                <!-- product -->
                <!-- map -->
                    <!-- alert -->
                    <div class="col-12" id="{{$map->id}}_alert_pro">
                        <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="mb-0 text" style="text-align: center;">
                                نقشه
                            </h4>
                            <div class="custom-control">
                                <button name="map" onclick="settingg('map')" @if($setting->map!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;" @else class="btn btn-sm btn-outline-danger" id="zero" @endif >
                                    <span  data-feather="check-square"></span>
                                </button>
                            </div>
                            <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                                <a data-target="#{{$map->id}}_modal_map" data-toggle="modal"  type="button" class="btn btn-sm btn-outline-info mx-1">
                                    <span data-feather="info"></span>
                                    مشاهده
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end - alert -->
                    <!-- show -->
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="{{$map->id}}_modal_map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">نقشه</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5>تصاویر</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a href="<?= url('/images/'.$map->map_img) ?>">
                                                <img style=" max-width: 100%;height: auto;" src="<?= url('/images/'.$map->map_img) ?>" >
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">بستن</button>
                                    <a href="{{$map->map_link}}" class="btn btn-outline-info">مشاهده نقشه</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end show -->
                <!-- map -->
                <!-- iso -->
                    <!-- alert -->
                    <div class="col-12" id="alert_iso">
                        <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="mb-0 text" style="text-align: center;">
                                گواهینامه
                            </h4>
                            <div class="custom-control">
                                <button name="iso" onclick="settingg('iso')" @if($setting->iso!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;" @else class="btn btn-sm btn-outline-danger" id="zero" @endif >
                                    <span  data-feather="check-square"></span>
                                </button>
                            </div>
                            <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                                <a href="{{route('iso.index')}}" type="button" class="btn btn-sm btn-outline-info mx-1">
                                    <span data-feather="info"></span>
                                    مشاهده
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end - alert -->
                <!-- iso -->
                <!-- gallery image -->
                    <!-- alert -->
                    <div class="col-12" id="alert_iso">
                        <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="mb-0 text" style="text-align: center;">
                                گالری عکس
                            </h4>
                            <div class="custom-control">
                                <button name="image" onclick="settingg('image')" @if($setting->image!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;" @else class="btn btn-sm btn-outline-danger" id="zero" @endif >
                                    <span  data-feather="check-square"></span>
                                </button>
                            </div>
                            <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                                <a href="{{route('images.index')}}" type="button" class="btn btn-sm btn-outline-info mx-1">
                                    <span data-feather="info"></span>
                                    مشاهده
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end - alert -->
                <!-- gallery image -->
                <!-- catalog -->
                    <!-- alert -->
                    <div class="col-12" id="alert_iso">
                        <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4 class="mb-0 text" style="text-align: center;">
                               کاتالوگ
                            </h4>
                            <div class="custom-control">
                                <button name="catalog" onclick="settingg('catalog')" @if($setting->catalog!="0") class="btn btn-sm btn-outline-light" style="color:gold;font-size:105%;border-color:gold;" @else class="btn btn-sm btn-outline-danger" id="zero" @endif >
                                    <span  data-feather="check-square"></span>
                                </button>
                            </div>
                            <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                        </span>
                                <a href="{{route('catalog.index')}}" type="button" class="btn btn-sm btn-outline-info mx-1">
                                    <span data-feather="info"></span>
                                    مشاهده
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end - alert -->
                <!-- catalog -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="<?= Url('panel/jquery-3.3.1.js'); ?>"></script>
    <?php $url_settingg=Url('/admin/settingg'); ?>
    <script type="text/javascript">
        settingg=function(id)
        {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }});
            $.ajax({
                url : '<?= $url_settingg ?>',
                type : "POST",
                data:'id='+id,
                success:function (data)
                {
                    if(data=="1")
                    {
                        $("button[name='"+id+"']").css(
                        {
                            "color": "gold",
                            "border-color": "gold"
                        });
                        $("button[name='"+id+"']").children().remove();
                        $("button[name='"+id+"']").html('<span  data-feather="check-square"></span>');
                        feather.replace()
                        logout=function () {
                            var ll=$('#logoutt').html();
                            ll.submit()
                        }
                    }
                    else
                    {
                        $("button[name='"+id+"']").css(
                            {
                                "color": "red",
                                "border-color": "red"
                            });
                        $("button[name='"+id+"']").children().remove();
                        $("button[name='"+id+"']").html('<span  data-feather="alert-octagon"></span>');
                        feather.replace()
                        logout=function () {
                            var ll=$('#logoutt').html();
                            ll.submit()
                        }
                    }

                },
                error:function () {
                    alert(error);
                }
            });
        };
    </script>
    
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("button#zero").each(function()
            {
                $( this ).children().attr("data-feather", "alert-octagon");
            });
            feather.replace()
            logout=function () {
                var ll=$('#logoutt').html();
                ll.submit()
            }
        });
    </script>
@endsection