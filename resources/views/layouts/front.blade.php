<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="tr">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="{{$shareData['general']->description}}">
    <meta name="keyword" content="{{$shareData['general']->keyword}}">
    <meta name="abstract" content="{{$shareData['general']->abstract}}">
    <meta name="author" content="{{$shareData['general']->author}}">
    <meta name="copyright" content="{{$shareData['general']->copyright}}">
    <meta name="robots" content="index,follow"/>
    <title>@yield('title')</title>
    <link rel="preload" href="{{asset('frontend/assets/fonts/Poppins-Medium.ttf')}}" as="font"  crossorigin>
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/live-resume.css')}}">
    @yield('css')
    <style>
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            background: url('{{asset('frontend/assets/images/loading5.gif')}}') center no-repeat #fff;
        }
    </style>
</head>
<body>
@include('layouts.menu')
<div class="content-wrapper">
    <aside>
        <div class="profile-img-wrapper">
            <img src="{{asset('storage/'.$shareData["personal"]->image)}}" alt="profile image" width="60" height="60">
        </div>
        <h1 class="profile-name">{{$shareData["personal"]->name}}</h1>
        <div class="text-center">
            <span class="badge badge-white badge-pill profile-designation">{{$shareData["personal"]->job}}</span>
        </div>
        <nav class="social-links">
            @foreach($shareData['socials'] as $social)
                <a href="{{$social->href}}" target="_blank" title="{{$social->name}}"
                   class="social-link text-{{$shareData['general']->themeColor}}">{!! $social->icon  !!}</a>
            @endforeach
        </nav>
        <div class="widget">
            <h5 class="widget-title">{{$shareData["personal"]->information_title}}</h5>
            <div class="widget-content">
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-birthday-cake text-{{$shareData['general']->themeColor}}"></i>
                    <strong>{{$shareData["personal"]->birthday}}</strong>
                </p>
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-laptop-code text-{{$shareData['general']->themeColor}}"></i>
                    <a target="_blank" class="text-dark social-link"
                       href="{!! $shareData["personal"]->website !!}"><strong>{{explode('//',$shareData["personal"]->website)[1]}}</strong></a>
                </p>
{{--                <p class="d-flex justify-content-md-between">--}}
{{--                    <i class="fas fa-phone text-{{$shareData['general']->themeColor}}"></i>--}}
{{--                    <strong>{{$shareData["personal"]->phone}}</strong>--}}
{{--                </p>--}}
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-mail-bulk text-{{$shareData['general']->themeColor}}"></i>
                    <a target="_blank" class="text-dark social-link"
                       href="mailto:{{$shareData["personal"]->mail}}"><strong>{{$shareData["personal"]->mail}}</strong></a>
                </p>
                <p class="d-flex justify-content-md-between">
                    <i class="fas fa-home text-{{$shareData['general']->themeColor}}"></i>
                    <strong>{{$shareData["personal"]->location}}</strong>
                </p>

{{--                <a href="{{asset('storage/'.$shareData["personal"]->cv)}}" target="_blank"--}}
{{--                   class="btn btn-download-cv btn-{{$shareData['general']->themeColor}} rounded-pill text-white">--}}
{{--                    <img src="{{asset('frontend/assets/images/download.svg')}}" alt="download" class="btn-img">--}}
{{--                    Özgeçmiş--}}
{{--                </a>--}}

            </div>
        </div>
        <div class="widget card">
            <div class="card-body">
                <div class="widget-content">
                    <h5 class="widget-title card-title text-{{$shareData['general']->themeColor}}">Diller</h5>
                    @php
                        $specialLanguages = explode(',',$shareData["personal"]->specialLanguages);
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
                    <h5 class="widget-title card-title text-{{$shareData['general']->themeColor}}">İlgi Alanlarım</h5>
                    @php
                        $interests = explode(',',$shareData["personal"]->interests);
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
        <footer>{{$shareData['general']->footer}}</footer>
    </main>
</div>
<div class="loader"></div>
<script src="{{{asset('frontend/assets/vendors/jquery/dist/jquery.min.js')}}}"></script>
<script src="{{asset('frontend/assets/vendors/@popperjs/core/dist/umd/popper-base.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/entry/jq.entry.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/live-resume.js')}}"></script>
@yield('js')
</body>
</html>
