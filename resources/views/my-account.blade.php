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
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link">Change password</a></li>
                                <li><a href="{{route('logout')}}" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a href="#orders" data-toggle="tab">recent orders</a> and <a href="#account-details" data-toggle="tab">Edit your password</a></p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userOrder as $key => $or)
                                            <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$or->id}}</td>
                                            <td>{{$or->created_at}}</td>
                                            <td>
                                                @if ($or->status == 1)
                                                <span>Procressing</span>
                                                @elseif ($or->status == 2)
                                                <span class="success">Completed</span>
                                                @elseif ($or->status == 4)
                                                <span>Delivering</span>
                                                @endif
                                            </td>
                                            <td>{{$or->total}}</td>   
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Change password</h3>
                                <div class="login">
                                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->has('new-password'))
                        <div class="alert alert-success">
                                    
                                        {{ $errors->first('new-password') }}
                                    
                                </div>
                                @endif
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="{{ route('changePassword') }}" method="POST">
                                                @csrf
                                                <label>Current Password</label>
                                                <input type="password" name="current-password">
                                               
                                                <label>New Password</label>
                                                <input type="password" name="new-password">
                                                
                                                <label>Retype New Password</label>
                                                <input type="password" name="new-password_confirmation">
                                                <br>
                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit">Save</button>
                                                </div>
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
    </section>
    <!-- my account end   -->

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