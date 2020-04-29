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
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

     <!--contact map start-->
    <div class="contact_map mt-60">
       <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="map-area">
                      <div id="googleMap">
                      <div style="overflow:hidden;">
                      <iframe width="100%" height="400" src="https://maps.google.com/maps?hl=en&amp;q=Hà Nội+()&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Map by <a href="https://www.googlemapsembed.net/">Embed Google Maps</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><!-- Embed code --><script type="text/javascript">(new Image).src="//googlemapsembed.net/get?r"+escape(document.referrer);</script><script type="text/javascript" src="https://googlemapsembed.net/embed"></script><!-- END CODE --><br />
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact map end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>contact us</h3>
                         <p></p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : 2 Lorem Rd,Ipsum, London</li>
                            <li><i class="fa fa-phone"></i> <a href="tel:(+84) 373302668">(+84) 373302668</a></li>
                            <li><i class="fa fa-envelope-o"></i> whysoserious245@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Tell us your project</h3>
                        <form id="contact-form" method="POST"  action="">
                            @csrf
                            <p>
                               <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text">
                            </p>
                            <p>
                               <label>  Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email">
                            </p>
                            <p>
                               <label>  Subject</label>
                                <input name="subject" placeholder="Subject *" type="text">
                            </p>
                            <div class="contact_textarea">
                                <label>  Your Message</label>
                                <textarea placeholder="Message *" name="content"  class="form-control2" ></textarea>
                            </div>
                            <button type="submit"> Send</button>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--contact area end-->

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