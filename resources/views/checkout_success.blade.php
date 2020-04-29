@extends('master.home')
@section('footer')

@section('main')
<!--error section area start-->
<div class="error_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        
                        <div class="badge badge-success" style="font-size: 120px;margin-bottom: 20px;border-radius: 50%">&#10004</div>

                        <h2>Checkout Successfully</h2>
                        <p></p>
                        <a href="{{ route('home') }}">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error section area end-->
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
@stop()