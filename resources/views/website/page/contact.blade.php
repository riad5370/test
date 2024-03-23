@extends('website.include.master')
@section('title','LEF For Life | Contact-us')
@section('body')

        <!-- Carousel Start -->
        <div class="container-fluid carousel  px-0 mb-5 pb-5">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">              
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item carouselimg active">
                      <img src="{{asset('images/contactBasic/'.$ContactBasicInfo->image??'')}}" class="img-fluid w-100" alt="First slide">
                        <div class="carousel-caption">
                            <div class="container carousel-content">
                                
                                <h2 class="text-white text-center display-1 mb-4 animated slideInDown herofont minifont" >{{$ContactBasicInfo->title??''}}
                                </h2>
                                <h5 class="text-white text-center mb-4 animated slideInDown" style="text-align: justify;">
                                </h5>
                                
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <!-- Carousel End -->


<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
            <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Contact Us </h5>
            <h1 class="display-5 w-50 mx-auto">We’d love to hear from you.</h1>
        </div>
        <div class="row g-4 wow fadeInUp mb-5" data-wow-delay=".3s">
            

            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex bg-light p-3 rounded contact-btn-link">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3 ms-3" style="width: 64px; height: 64px;">
                        <i class="fa fa-phone text-dark"></i>
                    </div>
                    <div class="ms-3 contact-link">
                        <h2 class="text-dark">Mail & Call Us</h2>
                        <a class="h5 text-dark fs-5 " >Email: {{$widget->email??''}}</a><br>
                        <a class="h5 text-dark fs-5 " href="tel:+8801712-948792">Phone: +88{{$widget->number??''}}</a>
                    </div>
                </div>
            </div>
            

            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex bg-light p-3 rounded contact-btn-link">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3 ms-3" style="width: 64px; height: 64px;">
                        <i class="fas fa-map-marker-alt text-dark"></i>
                    </div>
                    <div class="ms-3 contact-link">
                        <h2 class="text-dark">Address</h2>
                        <a class="h5 text-dark fs-5 " >{{$widget->address??''}}</a>
                        
                    </div>
                </div>
            </div>

            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="d-flex bg-light p-3 rounded contact-btn-link">
                    <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3 ms-3" style="width: 64px; height: 64px;">
                        <i class="fa fa-solid fa-money-bill text-dark"></i>
                    </div>
                    <div class="ms-3 contact-link">
                        <h2 class="text-dark">Bank Account Information</h2><br>
                        <a class="h5 text-dark fs-4 " ><b>Account Name :</b>{{$bankInfo->accountName??''}}</a><br>
                        <br>
                        <a class="h5 text-dark fs-4 " ><b>Bank Name :</b> {{$bankInfo->bankName??''}}</a><br>
                        <br>
                        <a class="h5 text-dark fs-4 " ><b>Account Number :</b>{{$bankInfo->accountNumber??''}}</a><br><br>
                        <a class="h5 text-dark fs-4 " ><b>SWIFT CODE :</b>{{$bankInfo->swiftCode??''}}</a><br><br>
                        <a class="h5 text-dark fs-4 " >{{$bankInfo->address??''}}</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="d-flex  p-3 rounded contact-btn-link">
                    
                    <div class="ms-3 contact-link">
                        
                        <br><br>
                        <div class="social-icon">
                            <div class="d-flex justify-content-center col-lg-6  col-md-12">
                                <a class="px-2  " href="{{$widget->youtube_link??''}}"><i class="fab fa-youtube fa-2x text-dark">YOUTUBE</i></a>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center  col-lg-6  col-md-12">
                                <a class="pe-2  " href="{{$widget->fb_link??''}}"><i class="fab fa-facebook-f fa-2x text-dark">ACEBOOK</i></a>
                                <br>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center col-lg-6  col-md-12">
                                <a class="px-2  " href="https://www.youtube.com/@lefforlife"><i class="fab fa-brands fa-whatsapp fa-2x text-dark">WhatsApp</i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>


            
        </div>
        <div class="container">
            <div class="row g-5 mb-5 contact-background">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="text-white">Get In Touch</h2>
                    <p class="mb-4 text-white">Support LEF FOR LIFE and be the catalyst for transforming lives and creating brighter futures for underprivileged children in Dhaka’s slums.
                    </p>
                    <div class="h-100 ">
                        <iframe src="{{$widget->map_link??''}}" class="border-10 bg-light rounded w-100" style="height: 75%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                    
                    <div class="rounded contact-form">
                        <form action="{{route('mail.sent')}}" method="post">
                            @if (session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="name" class="form-control p-3" placeholder="Your Name">
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" class="form-control p-3" placeholder="Your Email">
                            </div>
                            <div class="mb-4">
                                <input type="text" name="country" class="form-control p-3" placeholder="Country">
                            </div>
                            <div class="mb-4">
                                <textarea name="message" class="w-100 form-control p-3" rows="6" cols="10" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary border-0 py-3 px-4 rounded-pill" type="button">Send Message</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            

        </div>

    </div>
</div>
<!-- Contact End -->
@endsection