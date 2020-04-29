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
            <li>Secure Shopping</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs area end-->

<!--faq area start-->
<div class="faq_content_area mt-57">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Secure Shopping Guarantee</h2>
        <p>Because Techy takes credit card information security seriously, we have implemented a variety of technical and procedural controls to ensure transactions on our site remain private and protected.</p>
        <h2>Secure Socket Layers (SSL)</h2>
<p>
          To ensure the information you provide online is secure during transmission, we employ leading edge encryption technology and Secure Socket Layers (SSL) while processing any personal information you supply. These controls are certified by VeriSign®, a leading Internet security company.

</p>  
<p>
  You can also review our security certificate using your browser by clicking on the closed lock or solid key image at the bottom of your browser on any of the secure pages on our site. This will display our site security information. If you have any additional questions, please contact us.

</p>  
<p>
  To be sure you have the maximum protection available, we strongly advise that you download and install the latest version of your browser.

</p>        </div>
    </div>
  </div>
</div>

<!--faq area end-->

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