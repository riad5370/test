<!-- Footer Start -->
@php
    $image = App\Models\FooterImage::first();
@endphp
<div class="container-fluid footer py-5 wow fadeIn " data-wow-delay=".3s" style="
background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url({{ asset('images/footerImage/'. ($image ? $image->image : '')) }}
) center center no-repeat;
background-size: cover;
color: rgba(255, 255, 255, .7);
margin-top: 6rem; ">
    <div class="container py-5">
        <div class="row g-4 footer-inner">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-white fw-bold mb-4">LEF FOR LIFE</h4>
                    <p>Support LEF FOR LIFE and be the catalyst for transforming lives and creating brighter futures for underprivileged children in Dhaka’s slums.</p>
                    <p class="mb-0"><a class="" href="#">LEF FOR LIFE </a> &copy; 2024 All Right Reserved.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-white fw-bold mb-4">Usefull Link</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>About Us</a>
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>Contact Us</a>
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>Our Services</a>
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>Terms & Condition</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-white fw-bold mb-4">Services Link</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>Apartment Cleaning</a>
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>Office Cleaning</a>
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>Car Washing</a>
                        <a class="btn btn-link ps-0" href=""><i class="fa fa-check me-2"></i>Green Cleaning</a>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    @php
                        $address = App\Models\Widget::first();
                    @endphp
                    <h4 class="text-white fw-bold mb-4">Contact Us</h4>
                    <a href="" class="btn btn-link w-100 text-start ps-0 pb-3 border-bottom rounded-0"><i class="fa fa-map-marker-alt me-3"></i>{{$address->address??''}}</a>
                    <a href="" class="btn btn-link w-100 text-start ps-0 py-3 border-bottom rounded-0"><i class="fa fa-phone-alt me-3"></i>{{$address->number??''}}</a>
                    <a href="" class="btn btn-link w-100 text-start ps-0 py-3 border-bottom rounded-0"><i class="fa fa-envelope me-3"></i>{{$address->email??''}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->



<!-- Copyright Start -->
<div class="container-fluid copyright bg-nave py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                <a href="#" class="text-primary mb-0 display-6">LEF FOR <span class="text-white">LIFE</span></a>
            </div>
            <div class="col-md-4 copyright-btn text-center text-md-start mb-3 mb-md-0 flex-shrink-0">
                <a class="btn btn-primary rounded-circle me-3 copyright-icon" href="{{$widget->fb_link ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary rounded-circle me-3 copyright-icon" href="{{$widget->youtube_link ?? ''}}" target="_blank"><i class="fab fa-youtube" target="_blank"></i></a>
            </div>
            <div class="col-md-4 my-auto text-center text-md-end text-white">
                © 2024 <a class="border-bottom" href="https://lefforlife.org/">lefforlife.org</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->