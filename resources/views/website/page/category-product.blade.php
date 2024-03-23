@extends('website.include.master')
@section('title','LEF For Life | Category-Product')
@section('body')
   <!-- Page Header Start -->
  <!-- Carousel Start -->
  <div class="container-fluid carousel  px-0 mb-5 pb-5">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item carouselimg active">
              <img src="{{asset('images/productBasic/'.$productBasict->image??'')}}" class="img-fluid w-100" alt="First slide">
                <div class="carousel-caption">
                    <div class="container carousel-content">
                        
                        <h2 class="text-white text-center display-1 mb-4 animated slideInDown herofont minifont" >{{$productBasict->title ? $productBasict->title : ''}}
                        </h2>
                        <h5 class="text-white text-center mb-4 animated slideInDown" style="text-align: justify;">
                        </h5>
                        
                    </div>
                </div>
            </div>
            
            
        </div>
        
    </div>
</div>
<!-- Page Header End -->
  <!--product area start-->
  <section class="product_area related_products mb-118">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title text-center text-white mb-50 py-5">
                    <h1>Our Products</h1>
                </div>
            </div>
        </div>
        @if($category_products->isEmpty())
         <h4 class="text-center text-danger">No Found Products!</h4>
        @else
        <div class="product_container row">
            @foreach ($category_products as $categoryProduct)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <a href="{{route('details',$categoryProduct->slug)}}" >
                                    <img class="primary_img" src="{{ asset('images/products/preview/'.$categoryProduct->preview) }}"
                                    alt="consectetur">
                                </a>
                                <div class="product_action">
                                    <ul>
                                        <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="fa fa-solid fa-globe"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <figcaption class="product_content text-center">
                                
                                <h3 class="product_name herofont4"><a href="product-details.html" class="text-black">{{$categoryProduct->name}}</a></h3>
                                <div class="price_box">
                                <span class="text-black">Price: ${{$categoryProduct->price}}</span>
                                </div>
                                <div class="add_to_cart">
                                    <a class="px-5 py-3 btn btn-primary border-2 rounded-pill animated slideInDown" href="{{route('details',$categoryProduct->slug)}}" data-tippy="Product Details"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Details</a>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                </div>  
            @endforeach
        </div>
        @endif
        
    </div>
</section>
<!--product area end-->
{{-- <script src="{{ asset('frontend/product')}}/assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/slick.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/wow.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/images-loaded.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/jquery.nice-select.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/tippy-bundle.umd.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/jquery-ui.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/jquery.instagramFeed.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend/product')}}/assets/js/mailchimp-ajax.js"></script>
<!-- Main JS -->
<script src="{{ asset('frontend/product')}}/assets/js/main.js"></script> --}}
@endsection