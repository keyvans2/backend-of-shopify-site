@extends('layouts.app')
@section('style')
<style>
    .cart-container {
        width: 350px;
        height: auto;
        border-radius: 10px;
        border: 1px solid red;
    }

    .cart-item {
        width: 95%;
        height: auto;
        background-color: cyan;
        margin: 5px auto;
        border-radius: 5px;
    }

    .red {
        background-color: red;
    }

    .msg {
        display: none;
    }

</style>
@endsection
@section('content')
<div class="container">

<example-component></example-component>

    @if (Auth())
    <div class="row">
        <div class="col-lg-12">
            <h5>shopping cart</h5>

            <div class="cart-container">
                @if ($cart ?? '')

                @foreach ($cart ?? '' as $c)

                <div class="cart-item">

                    {{-- @php
                        $total = isset($cart) ? $cart + $cart->price : 0;
                    @endphp --}}
                    <div class="row">
                        <div class="col-lg-4 pt-2 name">{{$c->name}}</div>
                        <div class="col-lg-4 pt-2 price">{{$c->price}}</div>
                        <div class="col-lg-4 btn-con">
                            <button class="btn btn-danger mr-5 removeCart" data-id="{{$c->id}}">remove</button>
                        </div>

                    </div>

                </div>

                @endforeach
                <div class="row">
                    <div class="col-lg-12">
                    <a href="finalize" class="btn btn-block btn-warning p-2 mb-1" 
                            >finalize</a>
                    </div>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                {{-- 
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Modal Heading</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div> --}}

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Modal body..
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @else
                <p style="text-align:center;" class="pt-2">empty</p>
                @endif
            </div>
        </div>
    </div>
    @endif


 @can('isAdmin')
 <div class="row border p-5 mt-3">
    <div class="col-lg-12">
        <div class="form-group">
            <form action="/addProduct" method="post">
                {{@csrf_field()}}
                <input type="text" class="form-control" placeholder="name" name="name">
                <select  id="" class="form-control" name="cat[]" multiple>
                  @foreach ($cats ?? '' as $c)
                   <option value="{{$c->id}}">{{$c->name}}</option>
                  @endforeach
                </select>
                <input type="text" class="form-control" placeholder="price" name="price">
                <input type="submit" value="save" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
 @endcan
    <div class="row">
        <div class="col-lg-12" data-test="{{$pros}}">
            <table class="table table-striped">
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>price</td>
                    <td>#</td>
                </tr>

                @foreach ($pros as $pro)
                <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->name}}</td>
                    <td>{{$pro->price}}</td>
                    <td>
                        <button class="btn btn-primary addCart" data-id="{{$pro->id}}" data-name="{{$pro->name}}"
                            data-price="{{$pro->price}}" data-quantity="1" @if (Auth::check()) @else disabled @endif>add
                            to cart</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>

{{-- <script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let person = [{
                id: 1,
                name: 'apple',
                price: 2000
            },
            {
                id: 2,
                name: 'samsung',
                price: 2000
            },
        ]
        $(document).on('click', '.addCart', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');
            let quantity = $(this).data('quantity');
            $.ajax({
                url: '/ToCart',
                type: 'post',
                data: {
                    id: id,
                    name: name,
                    price: price,
                    quantity: quantity
                },
                success: function (data) {
                    //    $('.msg').css('display','block');
                    $.ajax({
                        url: '/showCarts',
                        type: 'get',

                        success: function (data) {
                            $('.cart-container').empty()
                            data.forEach(el => {
                                let cartItem = $(
                                    '<div class="cart-item"></div>');
                                let row = $('<div class="row"></div>')
                                let name = $(
                                    '<div class="col-lg-4 pt-2">' +
                                    el.name + '</div>')
                                let price = $(
                                    '<div class="col-lg-3 pt-2">' +
                                    el.price + '</div>')
                                let btnCon = $(
                                    '<div class="col-lg-3 btn-con"></div>'
                                )
                                let btn = $(
                                    '<button class="btn btn-danger mr-5 removeCart">' +
                                    'remove' + '</button>').data(
                                    'id', el.id)
                                $(row).append(name);
                                $(row).append(price);
                                $(btnCon).append(btn);
                                $(row).append(btnCon);
                                $(cartItem).append(row);
                                $('.cart-container').append(cartItem)
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                },
                error: function (error) {
                    console.log(error);

                }
            })

        })
        $(document).on('click', '.removeCart', function () {
            let This = $(this);
            let id = $(this).data('id');

            $.ajax({
                url: '/delCart',
                type: 'get',
                data: {
                    id: id
                },
                success: function (data) {
                    This.parent().parent().remove();
                    if (data) {
                        $('.cart-container').html(
                            '<p style="text-align:center;" class="pt-2">empty</p>')
                    }

                    // $.ajax({
                    //     url: '/showCarts',
                    //     type: 'get',
                    //     success: function (data) {
                    //       console.log(data);
                    //     },
                    //     error: function (error) {
                    //         console.log(error);
                    //     }
                    // })
                },
                error: function (error) {
                    console.log(error);
                }
            })

        })
        // 'name='+name & 'price='+price & 'quantity='+quantity
        // name:name,
        //                 price:price,
        //                 quantity:quantity,
        //         let res=
        // console.log($('.price').text()+' ');

        var sum = 0;
        $('.price').each(function () {
            // console.log($(this).text());
            sum += parseInt($(this).html());


        })
        console.log(sum);
    })

</script> --}}

@endsection
