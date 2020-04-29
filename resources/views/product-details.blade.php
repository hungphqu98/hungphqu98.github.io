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
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li>product details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
    <!--breadcrumbs area end-->

     <!--product details start-->
    <div class="product_details mt-50 mb-50">
        <div class="container">
            <div class="row">
                @foreach($product as $pros)
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{url('')}}/public/assets/img/product/{{ $pros->image }}" data-zoom-image="{{url('')}}/public/assets/img/product/{{ $pros->image }}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{url('')}}/public/assets/img/product/{{ $pros->image }}" data-zoom-image="{{url('')}}/public/assets/img/product/{{ $pros->image }}">
                                        <img src="{{url('')}}/public/assets/img/product/{{ $pros->image }}" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{url('')}}/public/assets/img/product/{{ $pros->image_2 }}" data-zoom-image="{{url('')}}/public/assets/img/product/{{ $pros->image_2 }}">
                                        <img src="{{url('')}}/public/assets/img/product/{{ $pros->image_2 }}" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{url('')}}/public/assets/img/product/{{ $pros->image_3 }}" data-zoom-image="{{url('')}}/public/assets/img/product/{{ $pros->image_3 }}">
                                        <img src="{{url('')}}/public/assets/img/product/{{ $pros->image_3 }}" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{url('')}}/public/assets/img/product/{{ $pros->image_4 }}" data-zoom-image="{{url('')}}/public/assets/img/product/{{ $pros->image_4 }}">
                                        <img src="{{url('')}}/public/assets/img/product/{{ $pros->image_4 }}" alt="zo-th-1"/>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="#">

                            <h1>{{ $pros->name }}</h1>
                            <div class="product_rating">
                                <ul>
                                                    @for( $i=0; $i<round($pros->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($pros->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                    {{$pros->product_rating}}/5 out of {{$comment->total()}} ratings

                                </ul>
                            </div>
                            <br>
                            <div class="price_box">
                            @if($pros->sale_price > 0)
                                            <span class="current_price">{{ number_format($pros->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($pros->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($pros->price) }} đ</span>
                                        @endif
                            </div>
                            <br>

                             <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$pros->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                    @if (Auth::guard('useracc')->check())
                                    <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$pros->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </form>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                @foreach($product as $pros)
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>

                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{$comment->total()}})</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                {!!$pros->description!!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>Reviews for this product</h2>
                                    @foreach($comment as $com)
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="{{url('')}}/public/assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                    @for( $i=0; $i<$com->rating; $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>$com->rating; $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                    </ul>
                                                </div>
                                                <p><mark>{{$com->user_email}} </mark>-{{$com->created_at}}</p>
                                                <span>{{$com->content}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                    {{$comment->links()}}
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                    </div>
                                    @if (Auth::guard('useracc')->check())
                                    <div class="product_review_form">
                                        <form action="{{route('comment.store')}}" method="post">
                                            @csrf
                                            <div class="product_ratting mb-10">
                                            <input class="star1 radioBtnStar" type="radio" name="rating" value="1" required>
                                            <label for="star1"><i class="starPicker starIcon1 fa fa-star"></i></label>

                                            <input class="star2 radioBtnStar" type="radio" name="rating" value="2">
                                            <label for="star2"><i class="starPicker starIcon2 fa fa-star"></i></label>

                                            <input class="star3 radioBtnStar" type="radio" name="rating" value="3">
                                            <label for="star3"><i class="starPicker starIcon3 fa fa-star"></i></label>

                                            <input class="star4 radioBtnStar" type="radio" name="rating" value="4">
                                            <label for="star4"><i class="starPicker starIcon4 fa fa-star"></i></label>

                                            <input class="star5 radioBtnStar" type="radio" name="rating" value="5">
                                            <label for="star5"><i class="starPicker starIcon5 fa fa-star"></i></label>
                                    </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="content" id="review_comment" ></textarea>                                      
                                                    <input type="hidden" name="product_id" value="{{$pros->id}}" >
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>
                                    </div>
                                    @else
                                    <div class="alert alert-info">
                                You have to be a <a href="{{route('register')}}" class="alert-link">Member </a> to write a review
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->
    <section class="product_area related_products mb-47">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Other Products</h2>
                    </div>
                    <div class="product_carousel product_style7 product_column4 owl-carousel">
                        @foreach($randProduct as $rp)
                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="{{ route('home.view',['id'=>$rp->id,'slug'=>$rp->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $rp->image }}" alt=""></a>
                                    <div class="label_product">
                                        @if($rp->sale_price > 0)
                                        <span class="label_sale">sale</span>
                                        @endif
                                    </div>
                                    <div class="quick_button">
                                        <a href="#" data-toggle="modal" data-target="#modal_box{{ $rp->id }}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_name">
                                        <h3><a href="{{ route('home.view',['id'=>$rp->id,'slug'=>$rp->slug]) }}">{{ $rp->name }}</a></h3>
                                    </div>
                                    <div class="product_rating">
                                        <ul>
                                        @for( $i=0; $i<round($rp->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($rp->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                        </ul>
                                    </div>
                                     <div class="price_box">
                                     @if($rp->sale_price > 0)
                                            <span class="current_price">{{ number_format($rp->sale_price) }}</span>
                                            <span class="old_price">{{ number_format($rp->price) }}</span>
                                            @else 
                                            <span class="current_price">{{ number_format($rp->price) }}</span>
                                        @endif
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            @if (Auth::guard('useracc')->check())
                                           <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                           @endif
                                            <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$rp->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->
    @foreach($randProduct as $pros)
    <div class="modal fade" id="modal_box{{$pros->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="modal_tab">
                                        <div class="tab-content product-details-large">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image }}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image_2 }}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image_3 }}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image_4 }}" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal_tab_button">
                                            <ul class="nav product_navactive owl-carousel" role="tablist">
                                                <li >
                                                    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image }}" alt=""></a>
                                                </li>
                                                <li>
                                                     <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image_2 }}" alt=""></a>
                                                </li>
                                                <li>
                                                   <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image_3 }}" alt=""></a>
                                                </li>
                                                <li>
                                                   <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="{{url('')}}/public/assets/img/product/{{ $pros->image_4 }}" alt=""></a>
                                                </li>
    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="modal_right">
                                        <div class="modal_title mb-10">
                                            <h2>{{$pros->name}}</h2>
                                        </div>
                                        <div class="modal_price mb-10">
                                            @if($pros->sale_price > 0)
                                                <span class="new_price">{{ number_format($pros->sale_price) }}</span>
                                                <span class="old_price">{{ number_format($pros->price) }}</span>
                                                @else 
                                                <span class="new_price">{{ number_format($pros->price) }}</span>
                                            @endif
                                        </div>
                                        <div class="modal_description mb-15">
                                        <p>{{$pros->shortdes}}</p>
                                        </div>
                                        <div class="variants_selects">
    
                                            <div class="modal_add_to_cart">
                                                <form action="{{ route('cart.add',['id'=>$pros->id]) }}">
                                                    <input  value="1" type="hidden">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

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