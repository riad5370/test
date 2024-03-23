@extends('website.include.master')
@section('title','LEF For Life |videos| Gallery')
@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center mb-2">Our Video Gallery</h1>
           </div>
        </div>
    </div>

      <!-- Carousel End -->
     <section class="video-section">
        <div class="youtube-container">

   <div class="main-video-container">
      <iframe  loop controls class="main-video" width="560" height="440" src="https://www.youtube.com/embed/4bvYDxDMbrg?si=2mrnY5hGHvBGK1R9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
   </div>

   <div class="video-list-container">

      @foreach ($videos as $video)
      <div class="list active">
         <video src="{{$video->link}}" class="list-video"></video>
         <img class="img" src="{{asset('images/latest/videos/'.$video->image)}}" >
         <h3 class="list-title">{{$video->title}}</h3>
      </div>
      @endforeach
   </div>

</div>
    </section>
@endsection