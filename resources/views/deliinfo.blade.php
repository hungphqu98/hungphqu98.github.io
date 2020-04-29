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
            <li>Delivery Information</li>
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
       <h2>What are the delivery charges?</h2>
<p>Delivery charge varies with each Seller.</p>
<p>Sellers incur relatively higher shipping costs on low value items. In such cases, charging a nominal delivery charge helps them offset logistics costs. The delivery charge may be waived off by some Sellers, if you shop with them for a minimum predefined value.</p>
<p>For example, seller WS Retail charges Rs 40 for delivery per item if the order value is less than Rs 500. While, orders of Rs 500 or above are delivered free. Please check with individual Sellers to understand their delivery charges.</p>
<h2>Why does the delivery date not correspond to the delivery timeline of X-Y business days?</h2>
<p>It is possible that the Seller or our courier partners have a holiday between the day your placed your order and the date of delivery, which is based on the timelines shown on the product page. In this case, we add a day to the estimated date. Some courier partners and Sellers do not work on Sundays and this is factored in to the delivery dates.</p>
<h2>What is the estimated delivery time?</h2>
<p>Sellers generally procure and ship the items within the time specified on the product page. Business days exclude public holidays and Sundays.</p>
<p>Estimated delivery time depends on the following factors:</p>
<p>The Seller offering the product</p>
<p>Product's availability with the Seller</p>
<p>The destination to which you want the order shipped to and location of the Seller.</p>
<h2>Are there any hidden costs (sales tax, octroi etc) on items sold by Sellers on Baaamboos?</h2>
<p>There are NO hidden charges when you make a purchase on Baaamboos. List prices are final and all-inclusive. The price you see on the product page is exactly what you would pay.</p>
<p>Delivery charges are not hidden charges and are charged (if at all) extra depending on the Seller's shipping policy.</p>
<h2>Why does the estimated delivery time vary for each seller?</h2>
<p>You have probably noticed varying estimated delivery times for sellers of the product you are interested in. Delivery times are influenced by product availability, geographic location of the Seller, your shipping destination and the courier partner's time-to-deliver in your location.</p>
<p>Please enter your default pin code on the product page (you don't have to enter it every single time) to know more accurate delivery times on the product page itself.</p>
<h2>Seller does not/cannot ship to my area. Why?</h2>
<p>Please enter your pincode on the product page (you don't have to enter it every single time) to know whether the product can be delivered to your location.</p>
<p>If you haven't provided your pincode until the checkout stage, the pincode in your shipping address will be used to check for serviceability.</p>
<p>Whether your location can be serviced or not depends on</p>
<p>Whether the Seller ships to your location</p>
<p>Legal restrictions, if any, in shipping particular products to your location</p>
<p>The availability of reliable courier partners in your location</p>
<p>At times Sellers prefer not to ship to certain locations. This is entirely at their discretion.</p>
<h2>Why is the COD option not offered in my location?</h2>
<p>Availability of COD depends on the ability of our courier partner servicing your location to accept cash as payment at the time of delivery.</p>
<p>Our courier partners have limits on the cash amount payable on delivery depending on the destination and your order value might have exceeded this limit. Please enter your pin code on the product page to check if COD is available in your location.</p>
<h2>I need to return an item, how do I arrange for a pick-up?</h2>
<p>Returns are easy. Contact Us to initiate a return. You will receive a call explaining the process, once you have initiated a return.</p>
<p>Wherever possible Ekart Logistics will facilitate the pick-up of the item. In case, the pick-up cannot be arranged through Ekart, you can return the item through a third-party courier service. Return fees are borne by the Seller.</p>
<h2>What do the different tags like "In Stock", "Available" mean?</h2>
  <h4>'In Stock'</h4>
<p>FFor items listed as "In Stock", Sellers will mention the delivery time based on your location pincode (usually 2-3 business days, 4-5 business days or 4-6 business days in areas where standard courier service is available). For other areas, orders will be sent by Registered Post through the Indian Postal Service which may take 1-2 weeks depending on the location.</p>
<h4>'Available'</h4>
<p>The Seller might not have the item in stock but can procure it when an order is placed for the item. The delivery time will depend on the estimated procurement time and the estimated shipping time to your location.</p>
<h4>'Preorder' or 'Forthcoming'</h4>
<p>Such items are expected to be released soon and can be pre-booked for you. The item will be shipped to you on the day of it's official release launch and will reach you in 2 to 6 business days. The Preorder duration varies from item to item. Once known, release time and date is mentioned. (Eg. 5th May, August 3rd week)</p>
<h4>'Out of Stock'</h4>
<p>Currently, the item is not available for sale. Use the 'Notify Me' feature to know once it is available for purchase.</p>
<h4>'Imported'</h4>
<p>Sometimes, items have to be sourced by Sellers from outside India. These items are mentioned as 'Imported' on the product page and can take at least 10 days or more to be delivered to you.</p>
<h4>'Back In Stock Soon'</h4>
<p>The item is popular and is sold out. You can however 'book' an order for the product and it will be shipped according to the timelines mentioned by the Seller.</p>
<h4>'Temporarily Unavailable'</h4>
<p>The product is currently out of stock and is not available for purchase. The product could to be in stock soon. Use the 'Notify Me' feature to know when it is available for purchase.</p>
<h4>'Permanently Discontinued'</h4>
<p>This product is no longer available because it is obsolete and/or its production has been discontinued.</p>
<h4>'Out of Print'</h4>
<p>This product is not available because it is no longer being published and has been permanently discontinued.</p>
<h2>Does Baaamboos deliver internationally?</h2>
<p>As of now, Baaamboos doesn't deliver items internationally.</p>
<p>You will be able to make your purchases on our site from anywhere in the world with credit/debit cards issued in India and 21 other countries, but please ensure the delivery address is in India.</p>
        </div>
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
</div>>
<!--brand area end-->

@stop()