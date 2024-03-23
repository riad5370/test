@extends('website.include.master')
@section('title','Photo | Gallery')
@section('body')
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Page Header Start -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center mb-5">Our Photo Gallery</h1>
        </div>
        <div class="col-lg-12">
            <div class="dropdown">
                <!-- Default dropup button -->
                <div class="btn-group dropup">
                    <!-- Add id to the button -->
                    <button id="dropdownMenuButton" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>Albums from</b> All
                    </button>
                    <ul class="dropdown-menu">
                        <!-- Dropdown menu links -->
                        {{-- @foreach ($photos as $photo)
                            @if ($photo->PhotoYear)
                                <li><a class="dropdown-item filter-year" data-year="{{ $photo->PhotoYear->id }}">{{ $photo->PhotoYear->year }}</a></li>
                            @endif
                        @endforeach --}}

                        @foreach ($years as $year)
                            <li><a class="dropdown-item filter-year" data-year="{{ $year->id }}">{{ $year->year }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
@if ($photos->isEmpty())
<h1>No Photo</h1>
@else
<section class="photos-section my-3">
    <div class="container">
        <div class="row">
            @foreach ($photos as $photo)
                <div class="col-lg-6 photo-item" data-year="{{ $photo->PhotoYear->id }}">
                    <div class="row">
                          <!-- Photos Page Start -->
                        <div class="col-lg-6 mb-3 wow fadeInUp" data-wow-delay=".1s">
                          <img src="{{ asset('images/latest/photoAlbum/' . $photo->image ?? '') }}" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                          <div class="card-body">
                              <h5 class="card-title">{{ $photo->title ?? '' }}</h5>
                              <p class="card-text">{{ \Illuminate\Support\Str::limit($photo->details ?? '', 140) }}.</p>
                              <div class="photos-btn">
                                  <a class="px-5 py-3 btn btn-primary border-2 rounded-pill animated slideInDown" href="{{ route('photo.details', $photo->id) }}">All Photos</a>
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
@endif
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
            $('#dropdownMenuButton').html('<b>Albums from</b> ' + $(this).text());
        });
    });
</script>
@endsection
