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
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-50 mb-50"  >
        <div class="container">
            <div class="row" >
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="shop_sidebar_banner mb-50">
                            <a href=""><img src="{{url('')}}/public/assets/img/bg/banner16.jpg" alt=""></a>
                        </div>
                        <div class="widget_list widget-filter">
                            <h2>Filter by price</h2>
                        <form action="{{route('demo')}}">
                            @csrf
                            <label for="range"></label>
                            <input type="checkbox" name="head" id="" value="1"> Headphones
                            <input type="checkbox" name="ear" id="" value="1"> Earphones
                            <input type="checkbox" name="speak" id="" value="1"> Speakers
                            <input type="text" class="js-range-slider" name="price_range" id="range" value="" />
                            <br>
                            <button type="submit">Submit</button>
                        </form>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_banner">
                        <img src="{{url('')}}/public/assets/img/bg/bannerbeats.jpg" alt="">
                    </div>
                    <div class="shop_title">
                        <h1>shop</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div>
                            &nbsp;
                        @sortablelink('id','By Newness') &nbsp; &nbsp;
                        @sortablelink('price','By Price') &nbsp; &nbsp;
                        @sortablelink('product_rating','By Rating') &nbsp;&nbsp;
                        @sortablelink('name','By Name')
                    </div>

                        <div class="page_amount">
                            <p>{{$data->total()}} results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    
                     @include('ajshop')

                     <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            {!! $data->render() !!}
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

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