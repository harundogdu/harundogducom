@extends('layouts.front')
@section('title')
    Portfolyo
@endsection
@section('css')
@endsection
@section('content')
    <section class="portfolio-section">
        <h2 class="section-title text-{{$general->themeColor}}">Portfolyo</h2>
        <div class="portfolio-wrapper">
            @foreach($portfolios as $portfolio)
                <figure class="portfolio-item portfolio-item-{{$general->themeColor}} hover-box gulum"
                        data-tag="{{$portfolio->featuredTag}}">
                    <a href="{!! $portfolio->href !!}" target="_blank">
                        <img src="{{asset('storage/'.$portfolio->image)}}"
                             alt="{{$portfolio->title}}"
                             class="portfolio-item-img">
                    </a>
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">{{$portfolio->title}}</h5>
                        <p class="portfolio-item-description my-2">{{$portfolio->tags}}</p>
                        <p class="card-text">{{$portfolio->description}}</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(function () {
            $(".gulum").each(function () {
                const dataTag = $(this).data('tag');
                $(this).attr('data-tag', dataTag);
            });
        });
    </script>
@endsection
