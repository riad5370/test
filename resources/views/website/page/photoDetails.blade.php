@extends('website.include.master')
@section('title','Photo | Gallery')
@section('body')
<!-- Photo Start End -->
<div class="container-fluid py-1">
    <section class="product_details wow fadeInUp">          
      <div class="container">
        <div class="row">
          <h1 class="text-center mt-5">{{$photoDetails->title??''}}</h1>
          <h5 class="text-center mb-5">{{$photoDetails->details??''}}</h5>
            <div class="col-lg-12">
              <div class="wrapper col-lg-12 wow fadeInUp mb-5" data-wow-delay=".3s">
                <div class="gallery">
                  @foreach ($photoGallery as $photo)
                    <div class="image col-lg-4"><span><img src="{{asset('images/latest/photoGalleryImg/'.$photo->albumGalleryImage)}}" alt=""></span></div>
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

@if ($photoDetails->vdo_link == '')
@else
  <div class="container mb-5 wow fadeInUp" >
    <div class=" embed-responsive embed-responsive-16by9">
      <iframe class="iframe embed-responsive-item" width="100%" height="600px"  src="{{$photoDetails->vdo_link??''}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
@endif
            

        </div>
<!-- Photo End -->

<!-- ================= Product Page End ================== -->

@endsection

