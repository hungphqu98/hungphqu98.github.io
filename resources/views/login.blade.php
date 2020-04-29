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
                            <li>login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!-- customer login start -->
    <div class="customer_login mt-60">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('login')}}" method="post">
                            
                            @csrf
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" >
                             </p>
                             <p>
                                <label>Password <span>*</span></label>
                                <input type="password" name="password">
                             </p>
                            <div class="login_submit">
                                <p><a href="{{route('get.form.forgot')}}">Lost your password?</a></p>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit">login</button>
                            </div>
                        </form>
                     </div>
                </div>
                <!--login area start-->
            </div>
        </div>
    </div>
    <!-- customer login end -->

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