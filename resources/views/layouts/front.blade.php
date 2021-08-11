<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="tr">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="{{$general->description}}">
    <meta name="keyword" content="{{$general->keyword}}">
    <meta name="abstract" content="{{$general->abstract}}">
    <meta name="author" content="{{$general->author}}">
    <meta name="copyright" content="{{$general->copyright}}">
    <meta name="robots" content="index,follow"/>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/live-resume.css')}}">
    @yield('css')
</head>

<body>

@include('layouts.menu')

<div class="content-wrapper">
    <aside>
        <div class="profile-img-wrapper">
            <img src="{{asset('storage/'.$personal->image)}}" alt="profile">
        </div>
        <h1 class="profile-name">{{$personal->name}}</h1>
        <div class="text-center">
            <span class="badge badge-white badge-pill profile-designation">{{$personal->job}}</span>
        </div>
        <nav class="social-links">
            @foreach($socials as $social)
                <a href="{{$social->href}}" target="_blank" title="{{$social->name}}"
                   class="social-link text-{{$general->themeColor}}">{!! $social->icon  !!}</a>
            @endforeach
        </nav>
        <div class="widget">
            <h5 class="widget-title">{{$personal->information_title}}</h5>
            <div class="widget-content">
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-birthday-cake text-{{$general->themeColor}}"></i>
                    <strong>{{$personal->birthday}}</strong>
                </p>
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-laptop-code text-{{$general->themeColor}}"></i>
                    <a target="_blank" class="text-dark social-link"
                       href="{!! $personal->website !!}"><strong>{{explode('//',$personal->website)[1]}}</strong></a>
                </p>
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-phone text-{{$general->themeColor}}"></i>
                    <strong>{{$personal->phone}}</strong>
                </p>
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-mail-bulk text-{{$general->themeColor}}"></i>
                    <a target="_blank" class="text-dark social-link"
                       href="mailto:{{$personal->mail}}"><strong>{{$personal->mail}}</strong></a>
                </p>
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-home text-{{$general->themeColor}}"></i>
                    <strong>{{$personal->location}}</strong>
                </p>

                <a href="{{asset('storage/'.$personal->cv)}}" target="_blank"
                   class="btn btn-download-cv btn-{{$general->themeColor}} rounded-pill text-white">
                    <img src="{{asset('frontend/assets/images/download.svg')}}" alt="download" class="btn-img"> Özgeçmiş
                </a>

            </div>
        </div>
        <div class="widget card">
            <div class="card-body">
                <div class="widget-content">
                    <h5 class="widget-title card-title text-{{$general->themeColor}}">Diller</h5>
                    @php
                        $specialLanguages = explode(',',$personal->specialLanguages);
                    @endphp
                    @foreach( $specialLanguages as  $specialLanguage)
                        <p>{{$specialLanguage}}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="widget card">
            <div class="card-body">
                <div class="widget-content">
                    <h5 class="widget-title card-title text-{{$general->themeColor}}">İlgi Alanlarım</h5>
                    @php
                        $interests = explode(',',$personal->interests);
                    @endphp
                    @foreach( $interests as  $interest)
                        <p>{{$interest}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </aside>
    <main>

        @yield('content')

        <footer>{{$general->footer}}</footer>
    </main>
</div>
<script src="{{{asset('frontend/assets/vendors/jquery/dist/jquery.min.js')}}}"></script>
<script src="{{asset('frontend/assets/vendors/@popperjs/core/dist/umd/popper-base.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/entry/jq.entry.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/live-resume.js')}}"></script>
@yield('js')
</body>

</html>
