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
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->



    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
       <div class="container">
            <div class="row">
               <div class="col-12">
                    @unless (Auth::guard('useracc')->check())
                    <div class="user-actions">              
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="{{route('login')}}" >Click here to login</a>
                        </h3>
                    </div> 
                    @endunless
                    
               </div>
            </div>
            <div class="checkout_form">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="#" method="post">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-lg-12 mb-20">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="name">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Street address  <span>*</span></label>
                                    <input type="text" name="address">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input  type="text" name="city">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="phone">

                                </div>
                                 <div class="col-lg-6 mb-20">
                                    <label> Email Address   <span>*</span></label>
                                    @if (Auth::guard('useracc')->check())
                                    <input type="text" name="email" value="{{Auth::guard('useracc')->user()->email}}">
                                    @else
                                    <input type="text" name="email" value="">
                                    @endif

                                </div>
                                <div class="col-12">
                                    <div class="order-notes">
                                         <label for="order_note" >Order Notes</label>
                                        <textarea id="order_note" name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                        <label for="">Payment Method<span>*</span></label>
                                    <div>
                                        <label style="font-weight: normal" >Cash on delivery</label>
                                            <input style="height: 13px;width: 13px" type="radio" name="payment_method" onclick="javascript:yesnoCheck();" id="noCheck" value="1" checked="checked">
                                        <label style="font-weight: normal" >Momo payment</label>
                                            <input style="height: 13px;width: 13px" type="radio" name="payment_method" onclick="javascript:yesnoCheck();" id="yesCheck" value="2" > 
                                            <div id="ifYes" style="visibility:hidden">
                                           
                                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Click here</button>

                                            <!-- Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Scan QR Code</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                    <img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=2%7C99%7C0865386004%7CDivine+Shop%7Chotro%40divineshop.vn%7C0%7C0%7C1010&choe=UTF-8&chld=L" alt="">
                                                 </div>   
                                                 <p>Receiver: Phan Quang Hưng</p>
                                                    <p>Number: 0373302668</p>
                                                    <p>Amount: {{number_format($cart->total_price)}} đ </p>
                                                    <p>After completing payment, input payment code below</p>
                                                    <p>Payment code <input type='text' id='code' name='code'><br></p>
                                                    <p>There will be an email after processing the payment. If after 30 minutes you don't receive any email them contact us</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>

                                            </div>
                                            </div>
                                         
                                            </div>
                                    </div>
                                    <br>
                                <div class="order_button">
                                    <button  type="submit">Order</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart->items as $key => $item)
                                        <tr>
                                            <td>{{$item['name']}}<strong> × {{$item['quantity']}}</strong></td>
                                            <td>{{number_format($item['price'])}} đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>{{number_format($cart->total_price)}} đ</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->


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