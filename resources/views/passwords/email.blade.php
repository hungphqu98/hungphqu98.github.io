<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reset Password</title>

        <link rel="stylesheet" href="{{url('')}}/public/assets/css/plugins.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/jquery-ui/jquery-ui.min.css" type='text/css'>
    <link rel="stylesheet" href="{{url('')}}/public/assets/range/css/ion.rangeSlider.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body >
        <div class="customer_login mt-60">
            <div class="container">
                <div class="row">
                   <!--login area start-->
                   <div class="col-lg-3 col-md-3"></div>
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form">
                            @if (session('error'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                            <h2>Reset Password</h2>                           
                    <form action="{{route('post.form.forgot')}}" method="post">
                                @csrf
                                <p>
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="email" id="email" >
                                 </p> 
                                <div class="login_submit">
                                    <button type="submit">Send Password Reset Link</button>
                                </div>
                            </form>
                         </div>
                    </div>
                    <div class="col-lg-3 col-md-3"></div>
                    <!--login area start-->
                </div>
            </div>
        </div>
    </body>
</html>