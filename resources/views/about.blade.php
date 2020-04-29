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
                            <li>about us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
       <!--about section area -->
    <div class="about_section mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about_thumb">
                        <img src="{{url('')}}/public/assets/img/about/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about_content">
                        <h1>Welcome To Techy!</h1>
                        <p>Techy is a leading audio distributor founded in 2019 by Hung Quang Phan. Through its family of premium consumer headphones, earphones, and speakers from Beats brand, Techy has helped Beats introduce an entirely new generation to the possibilities of premium sound entertainment. The brand’s continued success helps bring the energy, emotion, and excitement of playback in the recording studio back to the listening experience for music lovers worldwide. All products are of great quality, supported by Beats By Dre</p>
                        <div class="view__work">
                            <a href="https://www.beatsbydre.com/">Visit Beats</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end-->

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