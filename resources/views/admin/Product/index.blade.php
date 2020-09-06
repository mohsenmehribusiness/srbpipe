@extends('layouts.adminlayouts')

@section('head-content')
    <a class="btn btn-outline-success" href="{{ route('product.edit',['product'=>$product->id]) }}" >
        ویرایش قسمت {{$product->name}}
    </a>
@endsection

@section('title')
    {{$product->name}}
@endsection

@section('head')
    <!-- head_me -->
    <!-- sweet-alert -->
    <script src="<?= Url('panel/js/sweetalert.min.js'); ?>"></script>
    <link href="<?= Url('panel/css/sweetalert.css'); ?>" rel="stylesheet">
    <!-- sweet-alert -->
    <style>
        .borderless{
            border-top-style: none;
            border-left-style: none;
            border-right-style: none;
            border-bottom-style: none;
        }
        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            border: none;
        }
        table.borderless td,table.borderless th{
            border: none !important;
        }
         span:hover{
             color:rgb(230,85,64);
         }
    </style>
    <!-- lightbox moda -->
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <!-- lightbox moda -->
@endsection

@section('content')
    <div class="row mb-5 mt-5">
        <div class="col"></div>
        <div class="col text-center">
            <h2>
                {{$product->name}}
            </h2>
        </div>
        <div class="col"></div>
    </div>
    <?php  $images = explode("#", $product->img); ?>
    <div class="row">
        @foreach($images as $key=>$value)
            <div class="col text-center">
                <img style=" max-width: 100%;height: auto;" src="<?= url('images/product_'.$value) ?>" >
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <hr/>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p class="text-justify">
            {{$product->description}}
            </p>
        </div>
    </div>
@endsection
@section('script')
    <!-- lightbox moda -->
    <script>
        imagemodal=function (id) {
            // Get the modal
            var modal = $("#myModal_" + id);
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = $("#myImg_" + id);
            var modalImg = $("#img01_" + id);
            var captionText = $("#caption_" + id);
            img.onclick = function()
            {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        }
    </script>
    <!-- lightbox moda -->
@endsection