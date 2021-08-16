@extends('layouts.front')
@section('title')
    İletişim
@endsection
@section('css')
@endsection
@section('content')
    <section class="contact-section">
        <h2 class="section-title text-{{$shareData["general"]->themeColor}}">İletişime Geç</h2>
        <p class="mb-4">Bir proje, iş veya başka bir şey hakkında konuşmak isterseniz, iletişime geçin.</p>

        <div class="contact-cards-wrapper">
            <div class="contact-card">
                <h6 class="contact-card-title">Beni Arayın!</h6>
                <p class="contact-card-content">{{$shareData["personal"]->phone}}</p>
            </div>
            <div class="contact-card">
                <h6 class="contact-card-title">Mail Gönderin!</h6>
                <p class="contact-card-content">{{$shareData["personal"]->mail}}</p>
            </div>
        </div>

        <form id="formSendMail" action="" method="POST" class="contact-form">
            @csrf
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
            <button type="button" data-original-text="Mesaj Gönder" id="contactSendMail"
                    class="btn btn-{{$shareData["general"]->themeColor}} form-self-btn">Mesaj Gönder
            </button>
        </form>

    </section>
    <section class="location-section">
        <h5 class="section-title">Adres</h5>

        <div class="map-wrapper embed-responsive embed-responsive-16by9">
            <iframe
                src="{{$shareData["general"]->location}}"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#contactSendMail').click(function () {
                var self = $(this);
                const form = $('#formSendMail');
                const name = $('#name').val().trim();
                const email = $('#email').val().trim();
                const message = $('#message').val().trim();
                const url = '{{route('contact.send-mail')}}';

                function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }

                if (name === "" || email === "" || message === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Lütfen Boş Alan Bırakmayınız!',
                        showConfirmText: 'Tamam'
                    });
                } else if (!isEmail(email)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Lütfen Geçerli Bir EMail adresi Giriniz!',
                        showConfirmText: 'Tamam'
                    });
                } else {


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax(url, {
                        type: 'POST',
                        data: {
                            name: name,
                            email: email,
                            message: message
                        },
                        beforeSend: function () {
                            self.attr("disabled", "disabled");
                            var loadingText = '<span role="status" aria-hidden="true" class="spinner-border spinner-border-sm align-self-center mr-2"></span>Gönderiliyor.....';
                            if (self.html() !== loadingText) {
                                self.data('original', self.html());
                                self.html(loadingText);
                            }
                        },
                        async: true,
                        success: function (response) {
                            setTimeout(function () {
                                form.trigger('reset');
                                self.html(self.data('original'));
                                self.removeAttr("disabled", "disabled");

                            }, 1000);
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Başarılı!',
                                    text: response.message,
                                    showConfirmText: 'Tamam'
                                });

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Hata!',
                                    text: response.message,
                                    showConfirmText: 'Tamam'
                                });
                            }

                        },
                        error: function (response) {
                            alert(response.message)
                        }
                    })
                }


            })

        })
    </script>
@endsection
