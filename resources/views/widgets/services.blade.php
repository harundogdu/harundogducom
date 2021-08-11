<section class="services-section">
    <h6 class="section-subtitle text-{{$general->themeColor}}">Ne Yapıyorum?</h6>
    <h2 class="section-title">Hizmetlerim</h2>
    <div class="row">
        @foreach($services as $service)
            <div class="media service-card col-lg-6 d-flex justify-content-between align-items-center">
                <div class="service-icon text-{{$general->themeColor}}">{!! $service->icon !!}</div>
                <div class="media-body">
                    <h5 class="service-title text-{{$general->themeColor}}">{{$service->title}}</h5>
                    <p class="service-description">{{$service->subtitle}}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
