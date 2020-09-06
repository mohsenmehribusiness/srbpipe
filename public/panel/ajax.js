/*
<script type="text/javascript" >
    add_cart=function (id)
    {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }});
        $.ajax({
            url : '<?= $url_add ?>',
            type : "POST",
            data:'id_pro='+id,
            success:function (data)
            {
                $("#cart").html(data);
            }
        });
    };
    plus_cart=function (id)
    {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }});
        $.ajax({
            url : '<?= $url_plus ?>',
            type : "POST",
            data:'id_pro='+id,
            success:function (data)
            {
                alert('success');
                $("#special").remove();

            }
        });
    };
    min_cart=function (id)
    {
        /!*
        var hol=$("span#"+id+"_span").text();
        var holl=parseInt(hol);
        var strin=String(holl-1);
        $("span#"+id+"_span").remove();
        var ssj="<span id=\" "+id+"_span\"> "+strin+"</span>";
        $("span#"+id+"_span_mother").append(ssj);
        *!/
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }});
        $.ajax({
            url : '<?= $url_min ?>',
            type : "POST",
            data:'id_pro='+id,
            success:function (data)
            {
                $("#cart").html(data);
            }
        });
    };
    del_cart=function (id)
    {
        $("li#"+id).remove();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }});
        $.ajax({
            url : '<?= $url_del ?>',
            type : "POST",
            data:'id_pro='+id,
            success:function (data)
            {
                $("li#"+id).remove();
            }
        });
    };
</script>*/
