@extends('master.home')
@section('footer')

@section('main')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Payment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

     <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $key => $item)
                                <tr>
                                   <td class="product_remove"><a href="{{route('cart.delete',['id'=>$key])}}"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="{{url('')}}/public/assets/img/product/{{$item['image']}}" alt=""></a></td>
                                    <td class="product_name"><a href="#">{{$item['name']}}</a></td>
                                    <td class="product-price">{{number_format($item['price'])}} đ</td>
                                    <td class="product_quantity">
                                        <form action="{{route('cart.update',['id' => $key])}}" method="get">
                                            <input name="quantity" value="{{$item['quantity']}}" type="number">
                                            <button type="submit">Up</button>
                                        </form>
                                    </td>
                                    <td class="product_total">{{number_format($item['price']*$item['quantity'])}} đ</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            </div>
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">{{number_format($cart->total_price)}} đ</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="#">Proceed to Checkout</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
     <!--shopping cart area end -->

     <!--brand newsletter area start-->
     <div class="brand_newsletter_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="newsletter_inner">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->

@stop()