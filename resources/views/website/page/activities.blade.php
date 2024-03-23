@extends('website.include.master')
@section('title','LEF For Life | Activities')
@section('body')
        <!-- Carousel Start -->
        <div class="container-fluid carousel  px-0 mb-5 pb-5">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">              
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item carouselimg active">
                      <img src="{{ asset('images/basicActivitie/' . ($activitiBasic->image ? $activitiBasic->image : '')) }}
                      " class="img-fluid w-100" alt="First slide">
                        <div class="carousel-caption">
                            <div class="container carousel-content">                             
                                <h2 class="text-white text-center display-1 mb-4 animated slideInDown herofont minifont" >{{$activitiBasic->title ? $activitiBasic->title : ''}}
                                </h2>
                                <h5 class="text-white text-center mb-4 animated slideInDown" style="text-align: justify;">{{$activitiBasic->details ? $activitiBasic->details : ''}}
                                </h5>                               
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Photo Start End -->
        <div class="container-fluid py-1">
            <section class="product_details wow fadeInUp">
                
                <div class="container mb-1">
                    <div class="row">
                        <h1 class="text-center">"Where do the children come from?"</h1>
                <h5 class="text-center">{{$activitiBasic->gallery_header ? $activitiBasic->gallery_header : ''}}</h5>
                        <div class="col-lg-12">

                        <div class="wrapper col-lg-12 wow fadeInUp mb-5" data-wow-delay=".3s">
                            <div class="gallery">
                              @foreach ($activitiImages as $activitiImage)
                                <div class="image col-lg-4"><span><img src="{{asset('images/activitieGallery/'.$activitiImage->image)}}" alt=""></span></div>
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
                
            </section>
            

<section class="product_details ">
    <h2 class="text-blue text-center mb-3 wow fadeInUp mb-5" >Activities and Our Programs </h2>
    <div class="container mb-5">
      <div class="row">
        @foreach ($activitiPrograms as $activitiProgram)
          <div class="col-lg-3 col-md-6 p-3 wow fadeInUp mb-5" data-wow-delay=".1s">
            <div class="card border border-3 card-imgg" style="height: 31rem;">
              <img src="{{asset('images/activitieprogram/'.$activitiProgram->image)}}" class="card-top-img border border-3 card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text"></p>
                </div>      
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="{{$activitiProgram->icon}}"></i></li>
                    <li class="list-group-item text-center"><b>{{$activitiProgram->title}}</b></li>
                    <li class="list-group-item">{{$activitiProgram->details}}</li>
                  </ul>
                </div>
              </div>
          </div>
        @endforeach
      </div>
  </div>
</section>
    <!--product area start-->
 <section class="product_details ">          
    <div class="container mb-5">
      <div class="row">            
        @foreach ($activitiOthers as $activitiOther)
          <div class="col-lg-6 col-md-12 p-5 wow fadeInUp" data-wow-delay=".2s">              
            <h4 class="org-color">{{$activitiOther->name}}</h4>
            <h5>{{$activitiOther->title}}</h5>
            <p>{{$activitiOther->details}}</p>         
          </div>
          <div class="col-lg-6 col-md-12 p-3 wow fadeInUp" data-wow-delay=".3s">         
            <img src="{{asset('images/activitieOther/'.$activitiOther->image)}}" class="img-fluid orphanage-img">
          </div>
        @endforeach
      </div>
    </div>
</section>

<section class="product_details ">
    <h2 class="text-center wow fadeInUp">{{$activitiBasic->vdo_header ? $activitiBasic->vdo_header : ''}}</h2>
    <div class="container mb-5 wow fadeInUp" >

      <div class=" embed-responsive embed-responsive-16by9">
        <iframe class="iframe embed-responsive-item" width="100%" height="600px"  src="{{$activitiBasic->vdo_link ? $activitiBasic->vdo_link : ''}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>

    </div>
</section>
    <!--product area end-->
@endsection