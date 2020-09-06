@extends('layouts.adminlayouts')

@section('title')
    گواهینامه های سایت
@endsection

@section('head-content')
<a class="btn btn-outline-warning" href="{{ route('iso.create') }}" >
  اضافه کردن گواهینامه
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
    <!-- ajax -->
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <!-- ajax -->
@endsection

@section('script')
    <script src="<?= Url('panel/jquery-3.3.1.js'); ?>"></script>
    <?php $url_add=Url('/admin/chooseiso'); ?>
    <script type="text/javascript">
        chooseiso=function (id)
        {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }});
            $.ajax({
                url : '<?= $url_add ?>',
                type : "POST",
                data:'id='+id,
                success:function (data)
                {
                    if(data=="1")
                    {
                        $("#choose_" + id).css(
                        {
                            "color": "gold",
                            "font-size": "105%",
                            "transition": "0.9s",
                            "border-color": "gold"
                        });
                        $("#choose_" + id).children().css({
                            "color": "gold",
                            "font-size": "105%",
                            "transition": "0.9s"
                        });
                    }
                    if(data=="-1")
                    {
                        $("#choose_" + id).css({
                            "color": "rgb(248,249,250)",
                            "font-size": "100%",
                            "transition": "0.9s",
                            "border-color": "rgb(248,249,250)"
                        });
                        $("#choose_" + id).children().css({
                            "color": "black",
                            "font-size": "100%",
                            "transition": "0.9s"
                        });
                    }
                },
                error:function () {
                    alert(error);
                }
            });
        };
    </script>
@endsection


@section('content')
    @include('sweet::alert')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img style="height:200px;width:auto;"  src="<?= url('/images/small_'.$image->img) ?>" alt="{{$image->name}}" />
                            <div class="card-body">
                                <p class="card-text">
                                {{$image->name}}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('iso.edit' , ['id' => $image->id]) }}" type="button" class="btn btn-sm btn-outline-warning">
                                            <span data-feather="edit"></span>
                                        </a>
                                        <a id="choose_{{$image->id}}"  @if($image->state==1) style="color:gold;font-size:105%;border-color:gold;" @endif onclick="chooseiso({{$image->id}})" type="button" class="btn btn-sm btn-outline-light" title="ستاره زرد نشانه این است که این گواهینامه در صفحه اصلی نمایش داده خواهد شد" >
                                            <span data-feather="star" ></span>
                                        </a>
                                        <form class="btn btn-sm btn-outline-danger" action="{{ route('iso.destroy'  , ['id' => $image->id]) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <button  type="submit" class="btn btn-sm btn-outline-danger" style="border:0;padding:0px;" ><span data-feather="trash"></span></button>
                                        </form>
                                    </div>
                                    <small class="text-muted">
                                        <?php $v = new \Hekmatinasser\Verta\Verta($image->updated_at);?>
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
    <div class="row">
        {!! $images->render() !!}
    </div>
@endsection
