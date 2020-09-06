@extends('layouts.adminlayouts')

@section('title')
   صفحه ارتباط با ما
@endsection

@section('head-content')
{{--

        <a class="btn btn-outline-secondary" @if($asl=="state1") style="font-size:67%; ;background-color:white;color:green;border-color:green;" @endif  href="{{route('send_state')}}" >
            مشاهده انتقادات پاسخ داده شده
        </a>

        <a class="btn btn-outline-secondary" @if($asl=="state0") style="font-size:67%; ;background-color:white;color:green;border-color:green;" @endif  href="{{route('send.index')}}" >
            مشاهده انتقادات پاسخ داده نشده
        </a>
        <a class="btn btn-outline-secondary"  @if($asl=="state") style="font-size:67%; ;background-color:white;color:green;border-color:green;" @endif href="{{route('send_all')}}" >
            مشاهده همگی
        </a>
--}}

@endsection

@section('head')
    <!-- head_me -->
    <!-- sweet-alert -->
    <script src="<?= Url('panel/js/sweetalert.min.js'); ?>"></script>
    <link href="<?= Url('panel/css/sweetalert.css'); ?>" rel="stylesheet">
    <!-- sweet-alert -->
    <meta name="csrf-token" content="{{csrf_token()}}" >
@endsection

@section('content')
    @include('sweet::alert')
    <div class="row">
        @foreach($sends as $send)
            <div class="col-12" id="{{$send->id}}_alert">
                <div style="height:auto;padding-bottom:46px;" class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p class="mb-0 text">
                        <img  src="<?= Url('icon-header.png'); ?>" >
                        <span class="text-success px-1">{{$send->name}}</span>
                        {{$send->description}}
                    </p>
                    <div style="float: left;margin:5px;">
                        <span class="text-secondary"  style="opacity:0.3;">
                            <?php $v = new \Hekmatinasser\Verta\Verta($send->updated_at);?>
                            {!! $v->format('%B %d، %Y'); !!}
                        </span>
                        -
                         <span class="text-secondary"  style="opacity:0.3;">
                            {{$send->email}}
                        </span>
                        <form class="btn btn-sm btn-outline-danger" action="{{ route('send.destroy'  , ['id' => $send->id]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button  type="submit" class="btn btn-sm btn-outline-danger" style="border:0;padding:0px;" ><span data-feather="x"></span></button>
                        </form>
                        {{--<a href="{{ route('send.edit' , ['id' => $send->id]) }}" type="button" title="پاسخ" class="btn btn-sm btn-outline-success mx-1">
                            <span data-feather="check"></span>
                        </a>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! $sends->render() !!}
        </div>
    </div>
@endsection



@section('script')
@endsection


