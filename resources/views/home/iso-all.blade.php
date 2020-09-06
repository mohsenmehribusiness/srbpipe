@extends('layouts.home.homelayouts')

@section('body')
    <!-- start nav -->
    <!-- iso -->
    @include('layouts.home.iso')
    <!-- end iso -->
    <!-- start map -->
    <!-- map -->
    @include('layouts.home.map')
    <!-- end map -->
    <!-- start - footer -->
    <!-- footer -->
    @include('layouts.home.footer')
    <!-- end - footer -->
@endsection

@section('script')
    <!-- script button_iso_more -->
    <script type="text/javascript">
        $('#button_iso_more').remove();
    </script>
    <!-- script button_iso_more -->
@endsection