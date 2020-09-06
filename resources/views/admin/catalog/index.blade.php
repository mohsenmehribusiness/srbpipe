@extends('layouts.adminlayouts')

@section('title')
   کاتالوگ
@endsection

@section('head-content')
<a class="btn btn-outline-warning" href="{{ route('catalog.create') }}" >
    اضافه کردن کاتالوگ
</a>
<a class="btn btn-outline-warning" href="{{ route('catlogget') }}" >
    تنظیم بخش کاتالوگ
</a>
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
            <div class="row mb-5">
                <div class="col">
                </div>
                <div class="col">
                    <div class="text-center">
                    <button data-target="#modall" data-toggle="modal" class="btn btn-outline-secondary">جزئیات قسمت کاتالوگ</button>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="modall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">بخش کاتالوگ صفحه اصلی سایت</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <h5>تصویر</h5>
                                    </div>
                                </div>
                                <div class="row pl-5 pr-5">
                                    <a href="<?= url('images/catalog_main'.$catalogs[0]->img) ?>"><img style="width:700px;height:auto;" src="<?= url('images/catalog_main'.$catalogs[0]->img) ?>" alt=""></a>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <h5>توضیح</h5>
                                        <p class="text-justify">
                                            {{$catalogs[0]->description}}
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">بستن</button>
                                    <a href="{{ route('catlogget') }}" type="button" class="btn btn-outline-warning">ویرایش</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end show -->
                </div>
            </div>
            <div class="row">
                <?php $catalogs=$catalogs->forget(0) ?>
                @foreach($catalogs as $catalog)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="rounded" style="padding-top:1px;margin-left:110px;margin-right:110px;height:105px;width:105px;"  src="<?= url('/images/catalog_'.$catalog->img) ?>" alt="{{$catalog->name}}" />
                                <div class="card-body">
                                    <p class="card-text">
                                        {{$catalog->name}}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('catalog.edit' , ['id' => $catalog->id]) }}" type="button" class="btn btn-sm btn-outline-info">
                                                <span data-feather="edit"></span>
                                            </a>
                                            <form class="btn btn-sm btn-outline-danger" action="{{ route('catalog.destroy'  , ['id' => $catalog->id]) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button  type="submit" class="btn btn-sm btn-outline-danger" style="border:0;padding:0px;" ><span data-feather="trash"></span></button>
                                            </form>
                                        </div>
                                        <small class="text-muted">
                                            <?php $v = new \Hekmatinasser\Verta\Verta($catalog->updated_at);?>
                                            {!! $v->format('%B %d، %Y'); !!}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
