<section class="achievements-section">
    <h6 class="section-subtitle">Ne Yapıyorum?</h6>
    <h2 class="section-title">Başarılarım</h2>
    <div class="achievement-cards-wrapper">
        <div class="media achievement-card">
            <img src="{{asset('frontend/assets/images/puzzle.svg')}}" alt="puzzle" class="achievement-card-icon">
            <div class="media-body">
                <h4 class="achievement-card-title">{{$personal->completed_project}}+</h4>
                <p class="achievement-card-description">Tamamlanan Proje</p>
            </div>
        </div>
        <div class="media achievement-card">
            <img src="{{asset('frontend/assets/images/team.svg')}}" alt="puzzle" class="achievement-card-icon">
            <div class="media-body">
                <h4 class="achievement-card-title">{{$personal->happy_clients}}+</h4>
                <p class="achievement-card-description">Mutlu Müşteri</p>
            </div>
        </div>
        <div class="media achievement-card">
            <img src="{{asset('frontend/assets/images/trophy.svg')}}" alt="puzzle" class="achievement-card-icon">
            <div class="media-body">
                <h4 class="achievement-card-title">{{$personal->awards_recieved}}+</h4>
                <p class="achievement-card-description">Alınan Sertifika</p>
            </div>
        </div>
    </div>
</section>
