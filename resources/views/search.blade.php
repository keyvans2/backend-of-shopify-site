@extends('layouts.app')


@section('content')

<div class="container">
    <form action="">
    <div class="row">
        <div class="col-lg-12 col-sm-9" style="position:relative;">
            <input type="text" value="" class="form-control" id="search">
            <div style="width:20px;auto;position:absolute;top:8px;right:20px;" id='loading'>
              <img src="" alt="" width="20" height="20">
            </div>
        </div>
        
        <div class="col-lg-12  m-3 res">
            {{-- <span class="text-right float-right">from <b>Mobile</b> category</span> --}}
            
        </div>
       
    </div>
</form>
</div>


<script>
    $(document).ready(function () {
        $('input').keyup(function () {
           
            if ($(this).val().length > 0) {
                $.ajax({
                    url: 'goSearch',
                    type: 'get',
                    data: 'data=' + $(this).val(),
                    beforeSend() {
                        $('#loading img').attr("src", "{{asset("6.gif") }}");
                    },
                    success(data) {
                        $('#loading img').attr('src','')
                        if (data !== 'not found') {
                            var ul = $('<ul/>')
                            $(ul).attr('class', 'list-group')

                            
                            data.forEach(el => {
                                var li = $('<li/>').text(el.name)

                             
                                
                               
                               
                                el.cats.forEach(item => {
                                    // console.log(item.name);
                                    
                                var span=$('<span/>');
                                $(span).html('<b> '+item.name+' در دسته ی </b> ')
                                $(span).attr('class','float-right');
                                $(li).attr('class', 'list-group-item')
                                $(li).append(span)
                                $(ul).append(li)
                                });
                            });

                            var goDiv=$('<div/>');
                            var goLink=$('<a/>');
                            $(goLink).addClass('btn btn-block btn-primary')
                            $(goLink).text('view all')
                            $(goLink).attr('href','{{ url('resultSearch')}}/'+$('#search').val())
                            $(goDiv).addClass('col-lg-12 p-0')
                         
                            // $(goDiv).html('vfvs')
                            $(goDiv).append(goLink)
                            $('.res').empty();
                            $('.res').append($(ul));
                            $('.res').append($(goDiv));

                        } else {
                            $('.res').html(data);
                        }

                    }
                })






            } else {
                $('.res').empty();
            }


        })
    })

</script>

@endsection
