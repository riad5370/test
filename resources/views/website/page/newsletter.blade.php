@extends('website.include.master')
@section('title','LEF For Life | news | Letter')
@section('body')
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <!-- Page Header Start -->
<div class="container mt-5">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="text-center mb-5">Our Newsletter</h1>
      </div>
      <div class="col-lg-12">
          <div class="dropdown">
              <!-- Default dropup button -->
              <div class="btn-group dropup">
                <button id="dropdownMenuButton" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <b>Newsletter</b> All
                </button>
                  <ul class="dropdown-menu">
                      <!-- Dropdown menu links -->
                      @foreach ($newsLetters as $newsLetter)
                        @if ($newsLetter->newsletter)
                          <li><a class="dropdown-item filter-year" data-year="{{ $newsLetter->newsletter->id }}">{{ $newsLetter->newsletter->year }}</a></li>
                        @endif
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Page Header End -->

<section class="photos-section my-3">
  <div class="container">
      <div class="row mx-3 my-3">
          @foreach ($newsLetters as $newsLetter)
              <div class="col-lg-6 col-md-12 px-3 py-2 photo-item" data-year="{{ $newsLetter->newsletter->id }}">
                  <div class="row bg-white rounded">
                      <!-- Photos Page Start -->
                      <div class="col-lg-5 mb-3 wow fadeInUp" data-wow-delay=".1s">
                          <img src="{{ asset('images/latest/newsletter/'.$newsLetter->image) }}" class="img-fluid rounded news-img">
                      </div>

                      <div class="col-md-7">
                          <div class="card-body">
                              <h5 class="card-title">{{ $newsLetter->title ?? '' }}</h5>
                              <p class="card-text">{{ $newsLetter->details ?? '' }}</p>
                              <div class="photos-btn mb-3">
                                  <a class="px-5 py-3 btn btn-primary border-2 rounded-pill animated slideInDown" href="{{ $newsLetter->online_link }}">View Online</a>
                              </div>

                              <div class="">
                                  <a href="{{ $newsLetter->download_link }}" class="downlink"><i class="fa fa-solid fa-download"> Download</i></a>
                              </div>
                          </div>
                      </div>
                      <!-- Photos Page End -->
                  </div>
              </div>
          @endforeach
      </div>
  </div>
</section>
<!-- Product Page End -->

<script>
  $(document).ready(function () {
      // Listen for dropdown change event
      $('.dropdown-menu').on('click', '.filter-year', function (e) {
          e.preventDefault();

          // Get the selected year
          var selectedYear = $(this).data('year');

          // Show only albums for the selected year
          $('.photos-section .container .row .photo-item').hide();
          $('.photos-section .container .row .photo-item[data-year="' + selectedYear + '"]').show();

          // Change dropdown button text to the selected year
          $('#dropdownMenuButton').html('<b>Newsletter</b> ' + $(this).text());
      });
  });
</script>
@endsection