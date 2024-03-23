@extends('website.include.master')
@section('title','LEF For Life | About-us')
@section('body')

        <!-- Carousel Start -->
        <div class="container-fluid carousel  px-0 mb-5 pb-5">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item carouselimg active">
                      <img src="{{asset('images/basicAbout/'.$aboutBasic->image??'')}}" class="img-fluid w-100" alt="First slide">
                        <div class="carousel-caption">
                            <div class="container carousel-content">
                                
                                <h2 class="text-white text-center display-1 mb-4 animated slideInDown herofont minifont" >{{$aboutBasic->title ? $aboutBasic->title : ''}}
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



<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay=".3s">
            <h1 class="display-5">Who we are?</h1>
            <p class="mb-2 px-3 py-1 text-dark fs-5" style="text-align: justify;">{{$aboutBasic->we_are_content ? $aboutBasic->we_are_content : ''}}</p>
            
        </div>
        <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay=".5s">
            @foreach ($aboutWeAres as $aboutWeAre)
            <div class="blog-item">
                <img src="{{asset('images/weAre/'.$aboutWeAre->image)}}" class="img-fluid w-100 rounded-top" alt="">
                 <div class="rounded-bottom bg-light">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->


<!-- Mission Start -->

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
        </div>
        <div class="row g-5">
            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                <div class="text-center">
                    <h1 class="display-5">Our Mission</h1>
                    <p class="mb-2 px-3 py-1 text-dark fs-5" style="text-align: justify;">
                        {{$aboutBasic->missionContent ? $aboutBasic->missionContent : ''}}</p>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($missions as $key => $mission)
                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                    <img src="{{asset('images/mission/'.$mission->image)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
               <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($visions as $key => $vission)
                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <img src="{{asset('images/missionVission/'.$vission->image)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>             
                </div>
                <div class="text-center wow fadeInUp" data-wow-delay=".3s">
                    <h1 class="display-5">Our Vision</h1>
                    <p class="mb-2 px-3 py-1 text-dark fs-5" style="text-align: justify;"> {{$aboutBasic->vishionContent ? $aboutBasic->vishionContent : ''}}</p>     
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mission End -->

<!-- facilities Start -->
<div class="container-fluid services py-5">
    <div class="container text-center py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
            <h1 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Our Facilities</h1>
        </div>
        <div class="row g-5">
            @foreach ($facilities as $facilitie)
                <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-light rounded p-5 services-item">
                        <div class="d-flex " style="align-items: center; justify-content: center;">
                            <div class="mb-4 rounded-circle services-inner-icon">
                                <i class="{{$facilitie->icon}}"></i>
                            </div>
                        </div>
                        <h4>{{$facilitie->title}}</h4>
                        <p class="fs-7">{{$facilitie->details}}</p>
                    </div>
                </div>  
            @endforeach
        </div>
        
    </div>
</div>
<!-- facilities End -->   

<!-- CEO Team Start -->
@if ($members->isEmpty())
  
@else
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
            <h1 class="display-5 w-50 mx-auto">Our Board Member</h1>
        </div>
        <div class="row g-5">
            @foreach ($members as $staff)
            <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                <div class="rounded team-item">
                    <img src="{{asset('images/boardMember/'.$staff->image)}}" class="img-fluid w-100 rounded-top border border-bottom-0" alt="">
                    <div class="team-content bg-primary text-dark text-center py-3">
                        <span class="fs-4 fw-bold">{{$staff->name}}</span>
                        <p class="text-muted mb-0">{{$staff->title}}</p>
                    </div>
                    <div class="team-icon d-flex flex-column ">
                        <a href="{{$staff->social_link}}" class="btn btn-primary border-0 mb-2"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</div>  
@endif

<!-- CEO Team End -->

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
            <h1 class="display-5 w-50 mx-auto">Our Dedicated Staff</h1>
        </div>
        <div class="row g-5">
            @foreach ($staffs as $staff)
            <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                <div class="rounded team-item">
                    <img src="{{asset('images/staffs/'.$staff->image)}}" class="img-fluid w-100 rounded-top border border-bottom-0" alt="">
                    <div class="team-content bg-primary text-dark text-center py-3">
                        <span class="fs-4 fw-bold">{{$staff->name}}</span>
                        <p class="text-muted mb-0">{{$staff->title}}</p>
                    </div>
                    <div class="team-icon d-flex flex-column ">
                        <a href="{{$staff->social_link}}" class="btn btn-primary border-0 mb-2"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
            <h1 class="display-5 w-50 mx-auto">Our Honorable Donors</h1>
        </div>
        <div class="row g-5">
            @foreach ($donars as $donar)
                <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="rounded team-item">
                        <img src="{{asset('images/donars/'.$donar->image)}}" class="img-fluid w-100 rounded-top border border-bottom-0" alt="">
                        <div class="team-content bg-primary text-dark text-center py-3">
                            <span class="fs-4 fw-bold">{{$donar->name}}</span>
                            <p class="text-muted mb-0">{{$donar->title}}</p>
                        </div>
                        <div class="team-icon d-flex flex-column ">
                            <a href="{{$staff->social_link}}" class="btn btn-primary border-0 mb-2"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->


@endsection