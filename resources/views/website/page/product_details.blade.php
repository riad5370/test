@extends('website.include.master')
@section('title','LEF For Life | Product-details')
@push('css')
<link rel="stylesheet" href="{{asset('frontend/product')}}/assets/css/slick.css">

<!-- Main Style CSS -->
<link rel="stylesheet" href="{{asset('frontend/product')}}/assets/css/style.css">
@endpush
@section('body')


        <!-- Carousel Start -->
        <div class="container-fluid carousel  px-0 mb-5 pb-5">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item carouselimg active">
                      <img src="{{asset('images/productBasic/'.$productBasict->image??'')}}" class="img-fluid w-100" alt="First slide">
                        <div class="carousel-caption">
                            <div class="container carousel-content">
                                
                                <h2 class="text-white text-center display-1 mb-4 animated slideInDown herofont minifont" >{{$productBasict->title??''}}</h2>
                                <h5 class="text-white text-center mb-4 animated slideInDown" style="text-align: justify;"></h5>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
            </div>
        </div>
        <!-- Carousel End -->


<!-- ================= Product Page Start ================ -->

<!--product details start-->
<div class="container-fluid py-5">
    <section class="product_details mb-135">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product_zoom_gallery">
                       <div class="zoom_gallery_inner d-flex" id="gallery">
                            <div class="images zoom_tab_img">
                                @foreach ($thumbnails as $thamnail)
                                   <img src="{{ asset('images/products/thumbnail/'.$thamnail->thumbnail) }}" class="img tab-thumb p-1" alt="#">
                                @endforeach
                            </div>

                            <div class="product_zoom_main_img">
                                <div class="main-img product_zoom_thumb">
                                <img src="{{ asset('images/products/preview/'.$product_info->preview) }}" id="current" alt="#">
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="#">
                            <h2>{{$product_info->name}}</h2>
                            <div class="product_ratting_review d-flex align-items-center">
                                
                            </div>
                            <div class="price_box">
                                <h3>Price : <span class="current_price">${{$product_info->price}}</span></h3>
                            </div>
                            <div class="product_desc">
                                <h4>Mini Description</h4>
                                <p>{!!$product_info->short_desp!!}</p>
                            </div>
                            
                            <div class="priduct_social d-flex">
                                
                                <a class="px-2" href="#"><i class="fab fa-brands fa-whatsapp fa-2x text-dark">WhatsApp Us +8801712948792</i></a>
                            </div>
                        </form>
                    </div>
                </div>
            @if ($product_info->long_desp == '')
            
            @else
            <div class="col-lg-12 col-md-12 py-5">
                <h4>Product Description</h4>
                <p>{!!$product_info->long_desp!!} </p>
            </div>  
            @endif
                
            </div>
        </div>
    </section>  
</div>
<!--product details end-->
<!-- ================= Product Page End ================== -->
@if ($related_products->isEmpty())
@else
<section class="product_area related_products mb-118">
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title mb-50">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
        <div class="product_container row">
            
            @foreach ($related_products as $categoryProduct)
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
    </div>
</section>   
@endif



<script src="{{asset('frontend/product')}}/assets/js/slick.min.js"></script>

<!-- Main JS -->
<script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
       
@endsection
