@extends('website.include.master')
@section('title','LEF For Life | Success')
@section('body')
 <!-- Page Header Start -->
                <!-- Carousel Start -->
                <div class="container-fluid carousel  px-0 mb-5 pb-5">
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item carouselimg active">
                                <img src="{{asset('images/successBasic/'.$successBasic->image??'')}}" class="img-fluid w-100" alt="First slide">
                                <div class="carousel-caption">
                                    <div class="container carousel-content">
                                        <h5 class="text-white text-center mb-4 animated slideInDown"></h5>
                                        <h2 class="text-white text-center display-1 mb-4 animated slideInDown herofont minifont" >{{$successBasic->title??''}}</h2>
        
                                        <p class="text-white blog-p text-center mb-4 animated slideInDown  d-none d-lg-block" style="text-align: justify;">
                                            
                                            </p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                </div>
        
                <div class="container ">
                            <div class="row">
                                <div class="col-lg-12">
                                <h2 class="text-center">Unleashing Dreams, Creating Futures</h2>
                                <p class="p-5 wow fadeInUp fs-5" data-wow-delay=".3s" style="text-align: justify;">{{$successBasic->details??''}}</p>
                                </div>
                            </div>
                        </div>
                <!-- Carousel End -->
        
                <!-- Page Header End -->
        
        
                <!-- ================= Product Page Start ================ -->
        
            <!--product details start-->
                <div class="container-fluid py-5">
                    <section class="product_details mb-135">
                        <div class="container">
                            <div class="row">
                                @foreach ($success as $succes)
                                <div class="col-lg-6 col-md-12 p-4">
                                    <div class="container-blog">
                                        
                                        <div class="text-container-blog wow fadeInUp" data-wow-delay=".1s">
                                            <img src="{{asset('images/success/'.$succes->image)}}" class="image-blog" alt="Image description"> <br><br><br>
                                            <h2 class="blog-h3">{{$succes->name}}</h2>
                                            <p class="blog-p" style="text-align: justify;">{{$succes->details}}</p>
                                        </div>
                                    </div> 
                                </div> 
                                @endforeach
                            </div>
                        </div>
                    </section>  
                </div>
            
            <!--product details end-->
        
        
            <!--product area start-->
        
            <!--product area end-->
        
        
        
        
        
        
                <!-- ================= Product Page End ================== -->
        
@endsection