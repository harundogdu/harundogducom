@extends('layouts.front')
@section('title')
    İletişim
@endsection
@section('css')
@endsection
@section('content')
    <section class="contact-section">
        <h2 class="section-title">İletişime Geç</h2>
        <p class="mb-4">Bir proje, iş veya başka bir şey hakkında konuşmak isterseniz, iletişime geçin.</p>

        <div class="contact-cards-wrapper">
            <div class="contact-card">
                <h6 class="contact-card-title">Beni Arayın!</h6>
                <p class="contact-card-content">{{$personal->phone}}</p>
            </div>
            <div class="contact-card">
                <h6 class="contact-card-title">Mail Gönderin!</h6>
                <p class="contact-card-content">{{$personal->mail}}</p>
            </div>
        </div>

        <form action="#!" class="contact-form">
            <div class="form-group form-group-name">
                <label for="name" class="sr-only">Ad Soyad</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Ad Soyad">
            </div>
            <div class="form-group form-group-email">
                <label for="email" class="sr-only">Email Adresi</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Adresiniz">
            </div>
            <div class="form-group">
                <label for="message" class="sr-only">Mesaj</label>
                <textarea name="message" id="message" class="form-control" placeholder="Mesaj" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary form-submit-btn">Mesaj Gönder</button>
        </form>

    </section>
    <section class="location-section">
        <h5 class="section-title">Adres</h5>

        <div class="map-wrapper embed-responsive embed-responsive-16by9">
            <iframe
                src="{{$personal->geo_location}}"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
@endsection
@section('js')
@endsection
