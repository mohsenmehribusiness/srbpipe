<div>
    <!-- Session sweetalert -->
    @if($message=session('fla'))
        <script>
            swal({
                  title: "ثبت شد!",
                  text: "{{ $message }}",
                  icon: "danger",
                  button: "تایید!",
                });
        </script>
    @endif
    <!-- Session sweetalert -->
    <!-- session::flash('fla','ثبت انجام نشد') -->
</div>
