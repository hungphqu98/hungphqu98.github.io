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
                        <li><a href="{{route('home')}}">home</a></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


     <!--wishlist area start -->
    <div class="wishlist_area mt-60">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc wishlist">
                                    <div class="cart_page table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product_remove">Delete</th>
                                                    <th class="product_thumb">Image</th>
                                                    <th class="product_name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product_quantity">Stock Status</th>
                                                    <th class="product_total">Add To Cart</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($items as $item)
                                                <tr>
                                                   <td class="product_remove"><a href="{{ route('wishlist.delete',['id'=>$item->id]) }}" onclick="return confirm('Are you sure to delete?')">X</a></td>
                                                <td class="product_thumb"><img src="{{url('')}}/public/assets/img/product/{{$item->image}}" alt=""></td>
                                                    <td class="product_name">{{$item->name}}</td>
                                                    <td class="product-price">{{number_format($item->price)}} đ</td>
                                                    <td class="product_quantity">In Stock</td>
                                                    <td class="product_total"><a href="{{ route('cart.add',['id'=>$item->id]) }}">Add To Cart</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                             </div>
                         </div>

                    </form>
                    <div class="row">
                        <div class="col-12">
                             <div class="wishlist_share">
                                <h4>Share on:</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
     <!--wishlist area end -->

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