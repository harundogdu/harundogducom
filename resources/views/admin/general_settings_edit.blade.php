@extends('layouts.admin')
@section('title')
    Genel Site Bilgileri Güncelle
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Genel Site Bilgileri Güncelle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Genel Site Bilgileri Güncelle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Genel Site Bilgileriniz</h4>
                    <p class="card-description"> Genel Site bilgilerini eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="generalSettingsEditForm" method="POST"
                          action="{{route('general-settings-post')}}">
                        @csrf

                        <div class="form-group">
                            <label for="keyword">Anahtar Kelimeler*</label>
                            <input type="text" class="form-control" id="keyword" placeholder="Anahtar Kelimeler"
                                   name="keyword" value="{{$generalSettings->keyword}}">
                            <small class="text-muted">harun,harundoğdu,harundogdu</small>
                            @if ($errors->has('keyword'))
                                <span class="error">
                                    <strong>{{ $errors->first('keyword') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="author">Yapımcı*</label>
                            <input type="text" class="form-control" id="author" name="author"
                                   placeholder="Yapımcı" value="{{$generalSettings->author}}">
                            <small class="text-muted">Harun Doğdu</small>
                            @if ($errors->has('author'))
                                <span class="error">
                                    <strong>{{ $errors->first('author') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="abstract">Site Özeti*</label>
                            <input type="text" class="form-control" id="abstract" name="abstract"
                                   placeholder="Site Özeti"
                                   value="{{$generalSettings->abstract}}">
                            <small class="text-muted">Harun Doğdu Kişisel Web Sitesi</small>
                            @if ($errors->has('abstract'))
                                <span class="error">
                                    <strong>{{ $errors->first('abstract') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="copyright">Copyright Bilgisi*</label>
                            <input type="text" class="form-control" id="copyright" name="copyright"
                                   placeholder="Copyright Bilgisi" value="{{$generalSettings->copyright}}">
                            <small class="text-muted">Harun Doğdu</small>
                            @if ($errors->has('copyright'))
                                <span class="error">
                                    <strong>{{ $errors->first('copyright') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="copyright">Site Tema Rengi*</label>
                            <select name="themeColor" id="themeColor" class="form-control">
                                <option @if($generalSettings->themeColor === 'primary') selected @endif value="primary">Koyu Mavi</option>
                                <option @if($generalSettings->themeColor === 'info') selected @endif value="info">Açık Mavi</option>
                                <option @if($generalSettings->themeColor === 'danger') selected @endif value="danger">Kırmızı</option>
                                <option @if($generalSettings->themeColor === 'success') selected @endif value="success">Yeşil</option>
                                <option @if($generalSettings->themeColor === 'dark') selected @endif value="dark">Siyah</option>
                                <option @if($generalSettings->themeColor === 'warning') selected @endif value="warning">Sarı / Turuncu</option>
                                <option @if($generalSettings->themeColor === 'secondary') selected @endif value="secondary">Gri</option>
                            </select>
                            <small class="text-muted">Site Tema Rengi</small>
                            @if ($errors->has('themeColor'))
                                <span class="error">
                                    <strong>{{ $errors->first('themeColor') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Site Description*</label>
                            <textarea placeholder="Site Description" class="form-control text-white" name="description"
                                      id="description"
                                      rows="4">{{$generalSettings->description}}</textarea>
                            <small class="text-muted">Site Açıklaması</small>
                            @if ($errors->has('description'))
                                <span class="error">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="location">Lokasyon*</label>
                            <textarea placeholder="Lokasyon" class="form-control" name="location"
                                      id="location"
                                      rows="4">{{$generalSettings->location}}</textarea>
                            <small class="text-muted">Google Maps Iframe etiketi 'src' adresini yazın</small>
                            @if ($errors->has('location'))
                                <span class="error">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="footer">Altyazı*</label>
                            <textarea placeholder="Ana Ekran Açıklama" class="form-control" name="footer"
                                      id="footer"
                                      rows="4">{{$generalSettings->footer}}</textarea>
                            <small class="text-muted">Tüm hakları saklıdır © Harun Doğdu</small>
                            @if ($errors->has('footer'))
                                <span class="error">
                                    <strong>{{ $errors->first('footer') }}</strong>
                                </span>
                            @endif
                        </div>

                        <small class="text-danger">* Zorunlu alan</small>
                        <button type="button" id="generalSettingsEditButton" class="btn btn-info mr-2 btn-block">
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
            CKEDITOR.replace('subtitle');

            $('#generalSettingsEditButton').click(function () {
                const form = $('#generalSettingsEditForm');
                const keyword = $('#keyword').val().trim();
                const author = $('#author').val().trim();
                const abstract = $('#abstract').val().trim();
                const copyright = $('#copyright').val().trim();
                const themeColor = $('#themeColor').val().trim();
                const description = $('#description').val().trim();
                const footer = $('#footer').val().trim();
                const location = $('#location').val().trim();

                if (keyword === "" || author === "" || abstract === "" || copyright === "" || themeColor === "" || description === "" || footer === "" || location === "") {
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
