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
    @include('widgets.services')
    @include('widgets.achievements')
    @include('widgets.clients')
@endsection
@section('js')
@endsection
