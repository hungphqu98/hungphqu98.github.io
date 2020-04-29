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
                            <li>Frequently Questions</li>
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
                    <div class="faq_content_wrapper">
                        <h4>Below are frequently asked questions, you may find the answer for yourself</h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--Accordion area-->
    <div class="accordion_area">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <div id="accordion" class="card__accordion">
                  <div class="card card_dipult">
                    <div class="card-header card_accor" id="headingOne">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How can I order?

                          <i class="fa fa-plus"></i>
                          <i class="fa fa-minus"></i>

                        </button>

                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                           <p>You can order easily using our online platform. When you find a product you need, you can add it to cart, login and go through the ordering process. After the order is ready, you will receive order summary to your email. Order summary will also be stored to your account.
                           </p>
<p>You can also easily make reorders afterwards by clicking the “reorder” button on any of your previously made orders. After clicking the “reorder” button the cart will open and you can change quantities or products. </p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingTwo">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Why should I buy online?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>

                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <p>Speeding up the process. By ordering online you will you will get prices faster and you will be able to go through order confirmation and payment process much faster. This could save days of your time.</p>

        <p>Traceability: You will have easy access to all of your previous orders any time you want.</p>  

          <p></p>Reordering:  you can make a re-order anytime based on your previous orders by only couple of clicks. This will save time and effort as you don’t need to go through all the documents and emails from the past.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingThree">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Can I cancel my order?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        <p> If you want to cancel your order, please do so as soon as possible. If we have already processed your order, you need to contact us and return the product. Please contact us via email or hotline</p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingfour">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                        Do you have the product in stock?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapseeight" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                      <div class="card-body">
                        <p> All the products which are shown on our site are available. Order lead time depends on the products and quantities.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingfive">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                        Can I return a product?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapseseven" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                      <div class="card-body">
                        <p> If you want to return a product, please contact us via email</p>
                      </div>
                    </div>
                  </div>

                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingsix">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                        How long does it take for my order to reach me?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                      <div class="card-body">
                        <p>Orders are dispatched within 5 working days after payment confirmation.</p>
                        <p>Delivery delays due to service interruptions or inclement weather conditions are not the responsibility of Techy or the carrier.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingseven">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                        What are the payment methods available?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapsefive" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
                      <div class="card-body">
                        <p>At the moment, we only accept Cash on delivery and Momo payments.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingeight">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                        How do I know that my order has been successfully submitted?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapsesix" class="collapse" aria-labelledby="headingeight" data-parent="#accordion">
                      <div class="card-body">
                        <p>You will receive an email acknowledgement containing the order reference number and details of your purchase. Your order will be only dispatched upon receipt of payment.</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!--Accordion area end-->
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