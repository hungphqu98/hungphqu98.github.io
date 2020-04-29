<div class="row no-gutters shop_wrapper" id='shop-product' >
    
    @foreach($data as $pro)
   <div class="col-lg-4 col-md-4 col-12 " >
       <div class="single_product">
           <div class="product_thumb">
               <a href="{{ route('home.view',['id'=>$pro->id,'slug'=>$pro->slug]) }}"><img src="{{url('')}}/public/assets/img/product/{{ $pro->image }}" alt=""></a>
               <div class="label_product">
                @if($pro->sale_price > 0)
                <span class="label_sale" style="background-color:red">sale</span>
                @endif
               </div>
               <div class="quick_button">
               <a href="#" data-toggle="modal" data-target="#modal_box{{$pro->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
               </div>
           </div>
           <div class="product_content grid_content">
               <div class="product_name">
                   <h3><a href="{{ route('home.view',['id'=>$pro->id,'slug'=>$pro->slug]) }}">{{$pro->name}}</a></h3>
               </div>
               <div class="product_rating">
                   <ul>
                   @for( $i=0; $i<round($pro->product_rating); $i++ )
                               <li><a><i style="color: yellow" class="ion-ios-star"></i></a></li>
                               @endfor
                               @for( $i=5; $i>round($pro->product_rating); $i-- )
                               <li><a"><i class="ion-ios-star"></i></a"></li>
                               @endfor
                   </ul>
               </div>
                <div class="price_box">
                @if($pro->sale_price > 0)
                       <span class="current_price">{{ number_format($pro->sale_price) }} đ</span>
                       <span class="old_price">{{ number_format($pro->price) }} đ</span>
                       @else 
                       <span class="current_price">{{ number_format($pro->price) }} đ</span>
                   @endif
               </div>
               <div class="action_links">
                   <ul>
                    @if (Auth::guard('useracc')->check())
                      <li class="wishlist"><a href="{{route('wishlist.add',['id'=>$pro->id])}}" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                      @endif
                       <li class="add_to_cart"><a href="{{ route('cart.add',['id'=>$pro->id]) }}" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                   </ul>
               </div>
           </div>
           
       </div>
   </div>
   @endforeach

</div>
