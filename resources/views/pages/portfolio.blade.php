@extends('layouts.front')
@section('title')
    Portfolyo
@endsection
@section('css')
@endsection
@section('content')
    <section class="portfolio-section">
        <h2 class="section-title">Portfolyo</h2>

        <div class="portfolio-wrapper">

            @foreach($portfolios as $portfolio)
                <a target="_blank" href="{!! $portfolio->href !!}" style="width: 32% !important;">
                    <figure class="portfolio-item hover-box w-100 gulum" data-tag="{{$portfolio->featuredTag}}">
                        <img src="{{asset('storage/'.$portfolio->image)}}" alt="{{$portfolio->title}}"
                             class="portfolio-item-img">
                        <figcaption class="portfolio-item-details overlay">
                            <h5 class="portfolio-item-title">{{$portfolio->title}}</h5>
                            <p class="portfolio-item-description my-2">{{$portfolio->tags}}</p>
                            <p class="card-text">{{$portfolio->description}}</p>
                        </figcaption>
                    </figure>
                </a>
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
