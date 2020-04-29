@extends('master.home')
@section('footer')

@section('main')

<!--slider area start-->
<section class="slider_section mb-50">
        <div class="slider_area slider_eight owl-carousel">
        @foreach($ban as $banner)
            <div class="single_slider d-flex align-items-center" data-bgimg="{{url('')}}/public/assets/img/banner/{{$banner->image}}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content slider_content_eight">
                            @php
                            $banname = $banner->name;
                            $name = explode(" ",$banname);
                            $firstname = $name[0];
                            $secondname = $name[1];  
                            @endphp
                                <h1>{{$firstname}} </h1>
                                <h2>{{$secondname}}</h2>
                                <span>{{$banner->description}}</span>
                                <a href="{{$banner->link}}">shop</a>
                            <a href="{{$banner->video}}" data-modal="button">View <i class="fa fa-play-circle"></i></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>
    <!--slider area end-->
   
    <!--home product area start-->
    <section class="home_product_area product_color_seven mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_button tab_button_seven">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#Products7" role="tab" aria-controls="Products7" aria-selected="true">
                                    New Products
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#seller7" role="tab" aria-controls="seller7" aria-selected="false">
                                   On Sale
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#featured7" role="tab" aria-controls="featured7" aria-selected="false">
                                    featured products
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Products7" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                        @foreach($newProduct as $np)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a href="{{ route('home.view',['id'=>$np->id,'slug'=>$np->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $np->image }}" alt=""></a>
                                        <div class="label_product">
                                            @if($np->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                        </div>
                                        <div class="quick_button">
                                        <a href="" data-toggle="modal" data-target="#modal_box{{$np->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h3><a href="{{ route('home.view',['id'=>$np->id,'slug'=>$np->slug]) }}">{{$np->name}}</a></h3>
                                        </div>
                                        <div class="product_rating">
                                            <ul>
                                            @for( $i=0; $i<round($np->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($np->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                            </ul>
                                        </div>
                                        <div class="price_box">
                                        @if($np->sale_price > 0)
                                            <span class="current_price">{{ number_format($np->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($np->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($np->price) }} đ</span>
                                        @endif
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                @if (Auth::guard('useracc')->check())
                                               <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$np->id])}}"" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                               @endif
                                                <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$np->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="seller7" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                            @foreach($saleProduct as $sp)
                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="{{ route('home.view',['id'=>$sp->id,'slug'=>$sp->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $sp->image }}" alt=""></a>
                                    <div class="label_product">
                                        @if($sp->sale_price > 0)
                                            <span class="label_sale" style="background-color:red" style="">sale</span>
                                            @endif
                                    </div>
                                    <div class="quick_button">
                                    <a href="" data-toggle="modal" data-target="#modal_box{{$sp->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_name">
                                        <h3><a href="{{ route('home.view',['id'=>$sp->id,'slug'=>$sp->slug]) }}">{{ $sp->name }}</a></h3>
                                    </div>
                                    <div class="product_rating">
                                        <ul>
                                        @for( $i=0; $i<round($sp->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($sp->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                        </ul>
                                    </div>
                                     <div class="price_box">
                                        <span class="current_price">{{ number_format($sp->sale_price) }} đ</span>
                                        <span class="old_price">{{ number_format($sp->price) }} đ</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            @if (Auth::guard('useracc')->check())
                                           <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$sp->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                           @endif
                                            <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$sp->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="featured7" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                        @foreach($randProduct as $rp)
                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="{{ route('home.view',['id'=>$rp->id,'slug'=>$rp->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $rp->image }}" alt=""></a>
                                    <div class="label_product">
                                        @if($rp->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                    </div>
                                    <div class="quick_button">
                                    <a href="" data-toggle="modal" data-target="#modal_box{{$rp->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
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
                                            <span class="current_price">{{ number_format($rp->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($rp->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($rp->price) }} đ</span>
                                        @endif
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            @if (Auth::guard('useracc')->check())
                                           <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$rp->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
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
            </div>
        </div>
    </section>
    <!--home product area end-->

    <!--home product area start-->
    <section class="home_product_area product_color_seven mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="product_header">
                        <div class="section_title section_title_seven">
                            <h2>Headphones</h2>
                        </div>
                         <div class="product_tab_button button_color">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#Washing" role="tab" aria-controls="Washing" aria-selected="true">
                                        Solo Pro
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Laundry" role="tab" aria-controls="Laundry" aria-selected="false">
                                        Studio 3 Wireless
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Digital" role="tab" aria-controls="Digital" aria-selected="false">
                                        Solo 3 Wireless
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Refrigeration" role="tab" aria-controls="Refrigeration" aria-selected="false">
                                         Beats EP
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Cooker" role="tab" aria-controls="Cooker" aria-selected="false">
                                       Beats Pro
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="row home_product_reverse">
                <div class="col-lg-3 col-md-12">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ route('headphones') }}"><img src="{{url('')}}/public/assets/img/bg/head-ban.png" alt=""></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9 col-md-12 p-0">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Washing" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($soloPro as $sp)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$sp->id,'slug'=>$sp->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $sp->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($sp->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$sp->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$sp->id,'slug'=>$sp->slug]) }}">{{$sp->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($sp->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($sp->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($sp->sale_price > 0)
                                            <span class="current_price">{{ number_format($sp->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($sp->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($sp->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$sp->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li> 
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$sp->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                                </div>
                            </div>

                        <div class="tab-pane fade" id="Laundry" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($studio as $st)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$st->id,'slug'=>$st->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $st->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($st->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$st->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$st->id,'slug'=>$st->slug]) }}">{{$st->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($st->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($st->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($st->sale_price > 0)
                                            <span class="current_price">{{ number_format($st->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($st->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($st->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$st->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$st->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Digital" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($soloThree as $sot)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$sot->id,'slug'=>$sot->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $sot->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($sot->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$sot->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$sot->id,'slug'=>$sot->slug]) }}">{{$sot->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($sot->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($sot->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($sot->sale_price > 0)
                                            <span class="current_price">{{ number_format($sot->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($sot->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($sot->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$sot->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$sot->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Refrigeration" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($ep as $be)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$be->id,'slug'=>$be->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $be->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($be->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$be->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$be->id,'slug'=>$be->slug]) }}">{{$be->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($be->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($be->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($be->sale_price > 0)
                                            <span class="current_price">{{ number_format($be->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($be->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($be->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$be->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$be->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Cooker" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($pro as $bp)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$bp->id,'slug'=>$bp->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $bp->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($bp->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$bp->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$bp->id,'slug'=>$bp->slug]) }}">{{$bp->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($bp->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($bp->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($bp->sale_price > 0)
                                            <span class="current_price">{{ number_format($bp->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($bp->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($bp->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$bp->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$bp->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!--home product area end-->

     <!--home product area start-->
    <section class="home_product_area product_color_seven mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="product_header">
                        <div class="section_title section_title_seven">
                            <h2>Earphones</h2>
                        </div>
                         <div class="product_tab_button button_color">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#Camera7" role="tab" aria-controls="Camera7" aria-selected="true">
                                        Powerbeats Pro
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Lenses7" role="tab" aria-controls="Lenses7" aria-selected="false">
                                        Beats X
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Digital7" role="tab" aria-controls="Digital7" aria-selected="false">
                                        Powerbeats 3 Wireless
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Headphones7" role="tab" aria-controls="Headphones7" aria-selected="false">
                                        Urbeats
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12 p-0">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Camera7" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($powPro as $pp)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$pp->id,'slug'=>$pp->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $pp->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($pp->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$pp->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$pp->id,'slug'=>$pp->slug]) }}">{{$pp->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($pp->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($pp->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($pp->sale_price > 0)
                                            <span class="current_price">{{ number_format($pp->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($pp->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($pp->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$pp->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$pp->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Lenses7" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($bx as $bex)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$bex->id,'slug'=>$bex->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $bex->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($bex->sale_price > 0)
                                            <span class="label_sale" style="background-color:red">sale</span>
                                            @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$bex->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$bex->id,'slug'=>$bex->slug]) }}">{{$bex->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($bex->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($bex->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($bex->sale_price > 0)
                                            <span class="current_price">{{ number_format($bex->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($bex->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($bex->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$bex->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$bex->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Digital7" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($powThree as $pt)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$pt->id,'slug'=>$pt->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $pt->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($pt->sale_price > 0)
                                                <span class="label_sale" style="background-color:red">sale</span>
                                                @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$pt->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$pt->id,'slug'=>$pt->slug]) }}">{{$pt->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($pt->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($pt->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($pt->sale_price > 0)
                                            <span class="current_price">{{ number_format($pt->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($pt->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($pt->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$pt->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$pt->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Headphones7" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                                @foreach($urbeats as $ur)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$ur->id,'slug'=>$ur->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $ur->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($ur->sale_price > 0)
                                                <span class="label_sale" style="background-color:red">sale</span>
                                                @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$ur->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$ur->id,'slug'=>$ur->slug]) }}">{{$ur->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($ur->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($ur->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($ur->sale_price > 0)
                                            <span class="current_price">{{ number_format($ur->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($ur->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($ur->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$ur->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$ur->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('earphones')}}"><img src="{{url('')}}/public/assets/img/bg/bannerpopro.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!--home product area start-->
    <section class="home_product_area product_color_seven mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="product_header">
                        <div class="section_title section_title_seven">
                            <h2>Speakers</h2>
                        </div>
                        <div class="product_tab_button button_color">
                            <ul class="nav" role="tablist">
                                <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#Living7" role="tab" aria-controls="Living7" aria-selected="true">
                                        Beats Pill 2.0
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Dining7" role="tab" aria-controls="Dining7" aria-selected="false">
                                        Beats Pill +
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="row home_product_reverse">
                <div class="col-lg-3 col-md-12">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('speaker')}}"><img src="{{url('')}}/public/assets/img/bg/banpill.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 p-0">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Living7" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($pill as $pi)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$pi->id,'slug'=>$pi->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $pi->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($pi->sale_price > 0)
                                                <span class="label_sale" style="background-color:red">sale</span>
                                                @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$pi->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$pi->id,'slug'=>$pi->slug]) }}">{{$pi->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($pi->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($pi->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($pi->sale_price > 0)
                                            <span class="current_price">{{ number_format($pi->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($pi->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($pi->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$pi->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$pi->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Dining7" role="tabpanel">
                            <div class="product_carousel product_style7 product_column3 owl-carousel">
                            @foreach($pillPlus as $pip)
                               <div class="col-lg-3">
                                   <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ route('home.view',['id'=>$pip->id,'slug'=>$pip->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $pip->image }}" alt=""></a>
                                            <div class="label_product">
                                                @if($pip->sale_price > 0)
                                                <span class="label_sale" style="background-color:red">sale</span>
                                                @endif
                                            </div>
                                            <div class="quick_button">
                                            <a href="#" data-toggle="modal" data-target="#modal_box{{$pip->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="{{ route('home.view',['id'=>$pip->id,'slug'=>$pip->slug]) }}">{{$pip->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                @for( $i=0; $i<round($pip->product_rating); $i++ )
                                                    <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                                                    @endfor
                                                    @for( $i=5; $i>round($pip->product_rating); $i-- )
                                                    <li><a"><i class="ion-ios-star"></i></a"></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                             <div class="price_box">
                                             @if($pip->sale_price > 0)
                                            <span class="current_price">{{ number_format($pip->sale_price) }} đ</span>
                                            <span class="old_price">{{ number_format($pip->price) }} đ</span>
                                            @else 
                                            <span class="current_price">{{ number_format($pip->price) }} đ</span>
                                        @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    @if (Auth::guard('useracc')->check())
                                                   <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$pip->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                   @endif
                                                    <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$pip->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
    @foreach($data as $pros)
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
                                                <span class="new_price">{{ number_format($pros->sale_price) }} đ</span>
                                                <span class="old_price">{{ number_format($pros->price) }} đ</span>
                                                @else 
                                                <span class="new_price">{{ number_format($pros->price) }} đ</span>
                                            @endif
                                        </div>
                                        <div class="modal_description mb-15">
                                            <br>
                                            <br>
                                        <p>{{$pros->shortdes}}</p>
                                            <br>
                                            <br>
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
@stop()