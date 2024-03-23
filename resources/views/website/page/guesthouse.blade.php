@extends('website.include.master')
@section('title','LEF For Life | Guesthouse')
@section('body')
 <!-- Carousel Start -->
 <div class="container-fluid carousel  px-0 mb-5 pb-5">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item carouselimg active">
                <img src="{{asset('images/basicGallery/'.$guestBasic->image??'')}}" class="img-fluid w-100" alt="First slide">
                <div class="carousel-caption">
                    <div class="container carousel-content">
                        <h5 class="text-white text-center mb-4 animated slideInDown">{{$guestBasic->name??''}}</h5>
                        <h2 class="text-white text-center display-1 mb-4 animated slideInDown herofont minifont" >{{$guestBasic->title??''}}</h2>

                        <p class="text-white text-center mb-4 animated slideInDown  " style="text-align: justify;">
                            {{$guestBasic->details??''}}
                            </p>
                    </div>
                </div>
            </div>
            
            
        </div>

        <div class="container-fluid ">
            <div class="row">
                <p class="p-4 wow fadeInUp" data-wow-delay=".3s" style="text-align: justify;">{!! $guestBasic->slideDownDetails??'' !!}</p>
            </div>
        </div>
        

    </div>
</div>
<!-- Carousel End -->

<!-- Photo Start End -->
<div class="container-fluid py-1">
    <section class="product_details wow fadeInUp">
        <h1 class="text-center">"Make Yourself at Home"</h1>
        <h5 class="text-center">Our Cozy and Welcoming Guest Rooms</h5>
        <div class="container mb-1">
            <div class="row">
                <div class="col-lg-12">

                <div class="wrapper col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="gallery">
                        @foreach ($galleryImage as $gallery)
                            <div class="image col-lg-4"><span><img src="{{asset('images/guestHouseGallery/'.$gallery->image)}}" alt=""></span></div>
                      @endforeach
                    </div>
                  </div>
                </div>
                  <div class="preview-box">
                    <div class="details">
                      <span class="title"><p class="current-img"></p> <p class="total-img"></p></span>
                      <span class="icon fas fa-times"></span>
                    </div>
                    <div class="image-box">
                      <div class="slide prev"><i class="fas fa-angle-left"></i></div>
                      <div class="slide next"><i class="fas fa-angle-right"></i></div>
                      <img src="" alt="">
                    </div>
                  </div>
                  <div class="shadow"></div>

            </div>
        </div>
        
        <div class="text-center">
            <a href="contact.html" type="button" class="btn btn-danger mb-5">Book Now</a>
          </div>
    </section>
    
    <section class="product_details ">
        <h1 class="text-center">Common Space</h1>
        <h5 class="text-blue text-center">Connect, Collaborate and Relax</h5>
        <div class="container mb-5">
            <div class="row">

                <div class="col-lg-6 col-md-6 p-1 wow fadeInUp" data-wow-delay=".2s">
                    <div class=" border " style="width: 100%;">
                        <img src="{{ asset('images/guetHouseEditableImage/folder1/' . ($guestEdiatableImage ? $guestEdiatableImage->imageOne : '')) }}" class="img-fluid house-img" alt="...">
                      </div>
                </div>
                <div class="col-lg-6 col-md-6 p-1 wow fadeInUp" data-wow-delay=".3s">
                    <div class=" border " style="width: 100%;">
                        <img src="{{ asset('images/guetHouseEditableImage/folder2/' . ($guestEdiatableImage ? $guestEdiatableImage->imageTwo : '')) }}" class="img-fluid house-img" alt="...">
                      </div>
                </div>
                

            </div>
        </div>
        
        <div class="text-center mb-5 wow fadeInUp" >
            <h1 class="text-center">-------------------   Your Home Away From Home   -------------------</h1>
            <h5 class="text-blue text-center">Hospitality is simply an opportunity to show love and care</h5>
            <samp>-------------------   <button type="button" class="btn btn-secondary ">Book Now</button>   -------------------</samp>    
          </div>
    </section>

    <section class="product_details ">
        <h3 class="text-blue text-center mb-3 wow fadeInUp" >Packages at Our Exquisite Guest House</h3>
        <div class="container mb-5">
            <div class="row">
                @foreach ($packeges as $packege)
                <div class="col-lg-4 col-md-6 p-1 wow fadeInUp" data-wow-delay=".1s">
                    <div class=" border-gray  text-center p-2" style="width: 100%;">
                        <h5>{{$packege->head}}</h5>
                        <h5 class="org-color">{{$packege->title}}</h5>
                        <p>{{$packege->details}} <br> <b>${{$packege->price}}</b> <br><br><br></p>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
        
        
    </section>

    <section class="product_details ">
        <h2 class="text-center wow fadeInUp">{{$guestBasic->bottom_content??''}}</h2>
            <div class="container mb-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6 p-1 wow fadeInUp" data-wow-delay=".1s">
                        <div style="width: 100%;">
                            <img src="{{ asset('images/guetHouseEditableImage/folder3/' . ($guestEdiatableImage ? $guestEdiatableImage->imageThree : '')) }}" class="img-fluid trip-img" alt="...">
                            <h2 class="text-center">COVERED BOAT TRIP</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 p-1 wow fadeInUp" data-wow-delay=".2s">
                        <div style="width: 100%;">
                            <img src="{{ asset('images/guetHouseEditableImage/folder4/' . ($guestEdiatableImage ? $guestEdiatableImage->imageFour : '')) }}
                            " class="img-fluid trip-img" alt="...">
                            <h2 class="text-center">OPEN BOAT TRIP</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($otherPackege as $packege)
                    <div class="col-lg-6 col-md-6 p-1 wow fadeInUp" data-wow-delay=".1s">
                        <div class="col-lg-12">
                            <div class="mb-3 p-1 wow fadeInUp" data-wow-delay=".1s">
                                <div class="border-gray text-center p-2" style="width: 100%;">
                                    <h5>{{$packege->head}}</h5>
                                    <h5 class="org-color">{{$packege->title}}</h5>
                                    <p>{{$packege->details}}<br> <b>${{$packege->price}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        <div class="container mb-5 wow fadeInUp" data-wow-delay=".3s">

            <div class=" embed-responsive embed-responsive-16by9">
                <iframe class="iframe embed-responsive-item" width="100%" height="600px"  src="{{$guestBasic->vdo_link??''}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
        </div>

        
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
            <a href="contact.html" type="button" class="btn btn-danger mb-5">Book Now</a>
            <h3 class="org-color">{{$widget->email??''}}</h3>
            <h4>WhatsApp</h4>
            <h2 class="org-color">{{$widget->number??''}}</h2>
          </div>
    </section>


</div>

<div class="container">

    <div class="row text-center wow fadeInUp">
        <h2>-Our Community-</h2>
        <h1 class="dark-red">Where do we expense our money?</h1>
    </div>
    <div class="container">
        <div class="row">
            <p>1. LEF FOR LIFE: Empowering slum children with love, education, and food for a brighter future.</p>
            <p>2. Breaking barriers: LEF FOR LIFE offers hope and opportunities to disadvantaged children through love, education, and nutrition.</p>
        </div>
    </div>
</div>


<!-- ================= Product Page End ================== -->

@endsection