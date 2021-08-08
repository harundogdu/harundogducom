@extends('layouts.front')
@section('title')
    Anasayfa
@endsection
@section('css')
@endsection
@section('content')
    <section class="intro-section">
        <h2 class="section-title">{{$personal->main_title}}</h2>
        <p>{!! $personal->subtitle !!}</p>
        <a href="{{route('contact')}}" class="btn btn-primary btn-hire-me">İletişime Geçin!</a>
    </section>
    <section class="resume-section">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="section-subtitle">Bilgilerim</h6>
                <h2 class="section-title">Eğitim</h2>
                <ul class="time-line">
                    @foreach($educations as $edication)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{$edication->school_date}}</span>
                            <h6 class="time-line-item-title">{{$edication->school_name}}</h6>
                            <p class="time-line-item-subtitle">{{$edication->school_tag}}</p>
                            <p class="time-line-item-content">{{$edication->school_description}}</p>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-6">
                <h6 class="section-subtitle">Bilgilerim</h6>
                <h2 class="section-title">Deneyim</h2>
                <ul class="time-line">
                    @foreach($experiences as $experience)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{$experience->experience_date}}</span>
                            <h6 class="time-line-item-title">{{$experience->experience_job}}</h6>
                            <p class="time-line-item-subtitle">{{$experience->experience_company}}</p>
                            <p class="time-line-item-content">{{$experience->experience_description}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <section class="services-section">
        <h6 class="section-subtitle">WHAT I DO</h6>
        <h2 class="section-title">SERVICES</h2>
        <div class="row">
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="{{asset('frontend/assets/images/001-target.svg')}}" alt="target">
                </div>
                <div class="media-body">
                    <h5 class="service-title">web designing</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed
                        tortor.</p>
                </div>
            </div>
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="{{asset('frontend/assets/images/003-idea.svg')}}" alt="bulb">
                </div>
                <div class="media-body">
                    <h5 class="service-title">Graphic design</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed
                        tortor.
                    </p>
                </div>
            </div>
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="{{asset('frontend/assets/images/002-development.svg')}}" alt="development">
                </div>
                <div class="media-body">
                    <h5 class="service-title">Development</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed
                        tortor.
                    </p>
                </div>
            </div>
            <div class="media service-card col-lg-6">
                <div class="service-icon">
                    <img src="{{asset('frontend/assets/images/004-smartphone.svg')}}" alt="smartphone">
                </div>
                <div class="media-body">
                    <h5 class="service-title">Mobile design</h5>
                    <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed
                        tortor.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-section">
        <div id="testimonialCarousel" class="testimonial-carousel carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed tortor.</p>
                    <img src="{{asset('frontend/assets/images/Profile.png')}}" alt="profile" class="testimonial-img">
                    <p class="testimonial-name">Nout Golstein</p>
                </div>
                <div class="carousel-item">
                    <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed tortor.</p>
                    <img src="{{asset('frontend/assets/images/Profile.png')}}" alt="profile" class="testimonial-img">
                    <p class="testimonial-name">Nout Golstein</p>
                </div>
                <div class="carousel-item">
                    <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                        interdum sed tortor.</p>
                    <img src="{{asset('frontend/assets/images/Profile.png')}}" alt="profile" class="testimonial-img">
                    <p class="testimonial-name">Nout Golstein</p>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#testimonialCarousel" data-slide-to="1"></li>
                <li data-target="#testimonialCarousel" data-slide-to="2"></li>
            </ol>
        </div>
    </section>
@endsection
@section('js')
@endsection
