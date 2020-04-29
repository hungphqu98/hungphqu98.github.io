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
                            <li>Register</li>
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

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <p>
                                <label>Email address  <span>*</span></label>
                                <input type="text" name="email"  placeholder="Email" >
                             </p>
                             <p>
                                <label>Password <span>*</span></label>
                                <input type="password" name="password"  placeholder="Password">
                             </p>
                             <p>
                                <label>Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation"  placeholder="Retype password">
                             </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
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