@extends('layouts.admin')
@section('title')
    Kişisel Bilgileri Güncelle
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Kişisel Bilgileri Güncelle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Kişisel Bilgileri Güncelle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kişisel Bilgileriniz</h4>
                    <p class="card-description"> Kişisel bilgilerinizi eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="personalInformationEditForm" method="POST"
                          action="{{route('personal-information-post')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Adınız Soyadınız*</label>
                            <input type="text" class="form-control" id="name" placeholder="Adınız Soyadınız"
                                   name="name" value="{{$personalInformation->name}}">
                            <small class="text-muted">Harun Doğdu</small>
                            @if ($errors->has('name'))
                                <span class="error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="image">Resim*</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                           placeholder="Resim" value="{{$personalInformation->image}}">
                                    <small class="text-muted">Profil Resmi</small>
                                    @if ($errors->has('image'))
                                        <span class="error">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <img
                                        src="{{asset($personalInformation->image ? 'storage/'. $personalInformation->image : '')}}"
                                        class="w-50" alt="Profil Resmi">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="job">Aktif İş*</label>
                            <input type="text" class="form-control" id="job" name="job"
                                   placeholder="Aktif İş" value="{{$personalInformation->job}}">
                            <small class="text-muted">Backend Developer Intern</small>
                            @if ($errors->has('job'))
                                <span class="error">
                                    <strong>{{ $errors->first('job') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="job">Kişisel Bilgiler Başlığı*</label>
                            <input type="text" class="form-control" id="information_title" name="information_title"
                                   placeholder="Kişisel Bilgiler Başlığı"
                                   value="{{$personalInformation->information_title}}">
                            <small class="text-muted">Kişisel Bilgiler</small>
                            @if ($errors->has('information_title'))
                                <span class="error">
                                    <strong>{{ $errors->first('information_title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="birthday">Doğum Tarihi*</label>
                            <input type="text" class="form-control" id="birthday" name="birthday"
                                   placeholder="Doğum Tarihi" value="{{$personalInformation->birthday}}">
                            <small class="text-muted">07/02/1998</small>
                            @if ($errors->has('birthday'))
                                <span class="error">
                                    <strong>{{ $errors->first('birthday') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="website">Website*</label>
                            <input type="text" class="form-control" id="website" name="website"
                                   placeholder="Website" value="{{$personalInformation->website}}">
                            <small class="text-muted">https:://harundogdu.com</small>
                            @if ($errors->has('website'))
                                <span class="error">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon Numarası*</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   placeholder="Telefon Numarası" value="{{$personalInformation->phone}}">
                            <small class="text-muted">+90 *** *** ** **</small>
                            @if ($errors->has('phone'))
                                <span class="error">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="mail">Email Adresi*</label>
                            <input type="email" class="form-control" id="mail" name="mail"
                                   placeholder="Email Adresi" value="{{$personalInformation->mail}}">
                            <small class="text-muted">info@harundogdu.com</small>
                            @if ($errors->has('mail'))
                                <span class="error">
                                    <strong>{{ $errors->first('mail') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="location">Konum*</label>
                            <input type="text" class="form-control" id="location" name="location"
                                   placeholder="Konum" value="{{$personalInformation->location}}">
                            <small class="text-muted">Ankara / Türkiye</small>
                            @if ($errors->has('location'))
                                <span class="error">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="cv">Özgeçmiş*</label>
                                    <input type="file" class="form-control" id="cv" name="cv"
                                           placeholder="Özgeçmiş" value="{{$personalInformation->cv}}">
                                    <small class="text-muted">Özgeçmişiniz</small>
                                    @if ($errors->has('cv'))
                                        <span class="error">
                                            <strong>{{ $errors->first('cv') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    <label for="cv">Geçerli Özgeçmiş</label>
                                    <br>
                                    <a target="_blank" href="{{asset('storage/'.$personalInformation->cv)}}"
                                       class="btn btn-primary btn-lg btn-block">
                                        CV İndir</a>
                                    <small class="text-muted">Geçerli Özgeçmişiniz :
                                        <span class="text-danger">{{$personalInformation->cv}}</span>
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="specialLanguages">Konuşabildiğiniz Diller*</label>
                            <input type="text" class="form-control" id="specialLanguages" name="specialLanguages"
                                   placeholder="Konuşabildiğiniz Diller"
                                   value="{{$personalInformation->specialLanguages}}">
                            <small class="text-muted">İngilizce - Orta</small>
                            @if ($errors->has('specialLanguages'))
                                <span class="error">
                                    <strong>{{ $errors->first('specialLanguages') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="interests">İlgi Alanları*</label>
                            <input type="text" class="form-control" id="interests" name="interests"
                                   placeholder="İlgi Alanları" value="{{$personalInformation->interests}}">
                            <small class="text-muted">Futbol,Basketbol</small>
                            @if ($errors->has('interests'))
                                <span class="error">
                                    <strong>{{ $errors->first('interests') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="main_title">Ana Başlık*</label>
                            <input type="text" class="form-control" id="main_title" name="main_title"
                                   placeholder="Ana Başlık" value="{{$personalInformation->main_title}}">
                            <small class="text-muted">Merhabalar Ben Harun!</small>
                            @if ($errors->has('main_title'))
                                <span class="error">
                                    <strong>{{ $errors->first('main_title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Ana Ekran Açıklama*</label>
                            <textarea placeholder="Ana Ekran Açıklama" class="form-control" name="subtitle"
                                      id="subtitle"
                                      rows="4" style="color: #0a0a0a !important;">{{$personalInformation->subtitle}}</textarea>
                            <small class="text-muted">Hakkınızda açıklama</small>
                            @if ($errors->has('subtitle'))
                                <span class="error">
                                    <strong>{{ $errors->first('subtitle') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="completed_project">Tamamlanan Proje Sayısı*</label>
                            <input type="text" class="form-control" id="completed_project" name="completed_project"
                                   placeholder="Tamamlanan Proje Sayısı" value="{{$personalInformation->completed_project}}">
                            <small class="text-muted">1 - 999</small>
                            @if ($errors->has('completed_project'))
                                <span class="error">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="happy_clients">Mutlu Müşteri*</label>
                            <input type="text" class="form-control" id="happy_clients" name="happy_clients"
                                   placeholder="Mutlu Müşteri Sayısı" value="{{$personalInformation->happy_clients}}">
                            <small class="text-muted">1 - 999</small>
                            @if ($errors->has('location'))
                                <span class="error">
                                    <strong>{{ $errors->first('happy_clients') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="awards_recieved">Aldığım Sertifikalar*</label>
                            <input type="text" class="form-control" id="awards_recieved" name="awards_recieved"
                                   placeholder="Aldığım Sertifikalar" value="{{$personalInformation->awards_recieved}}">
                            <small class="text-muted">1 - 999</small>
                            @if ($errors->has('awards_recieved'))
                                <span class="error">
                                    <strong>{{ $errors->first('awards_recieved') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="footer">Altyazı*</label>
                            <textarea placeholder="Ana Ekran Açıklama" class="form-control" name="footer"
                                      id="footer"
                                      rows="4">{{$personalInformation->footer}}</textarea>
                            <small class="text-muted">Tüm hakları saklıdır © Harun Doğdu</small>
                            @if ($errors->has('footer'))
                                <span class="error">
                                    <strong>{{ $errors->first('footer') }}</strong>
                                </span>
                            @endif
                        </div>

                        <small class="text-danger">* Zorunlu alan</small>
                        <button type="button" id="personalInformationEditButton" class="btn btn-info mr-2 btn-block">
                            Güncelle
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace( 'subtitle' );

            $('#personalInformationEditButton').click(function () {
                const form = $('#personalInformationEditForm');
                const name = $('#name').val().trim();
                const job = $('#job').val().trim();
                const information_title = $('#information_title').val().trim();
                const birthday = $('#birthday').val().trim();
                const website = $('#website').val().trim();
                const phone = $('#phone').val().trim();
                const mail = $('#mail').val().trim();
                const location = $('#location').val().trim();
                const interests = $('#interests').val().trim();
                const main_title = $('#main_title').val().trim();
                const subtitle = $('#subtitle').val().trim();

                if (name === "" || job === "" || information_title === "" || birthday === "" || website === "" || phone === "" || mail === "" || location === "" || interests === "" || main_title === "" || subtitle === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Lütfen zorunlu alanları doldurunuz!',
                        confirmButtonText: 'Tamam'
                    })
                } else {
                    form.submit();
                }

            });
        })
    </script>
@endsection
