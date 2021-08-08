@extends('layouts.admin')
@section('title')
    Eğitim Bilgileri
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Eğitim Bilgileri Ekle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('education.index')}}">Eğitim Bilgileri</a></li>
                <li class="breadcrumb-item active" aria-current="page">Eğitim Bilgileri Ekle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Eğitim Bilgileriniz</h4>
                    <p class="card-description"> Eğitim bilgilerinizi eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="educationAddForm" method="POST" action="{{route('education.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="school_name">Okul Adı*</label>
                            <input type="text" class="form-control" id="school_name" placeholder="Okul Adı"
                                   name="school_name">
                            <small class="text-muted">Karadeniz Teknik Üniversitesi</small>
                        </div>
                        <div class="form-group">
                            <label for="school_tag">Okul Dalı*</label>
                            <input type="text" class="form-control" id="school_tag" name="school_tag"
                                   placeholder="Okul Dalı">
                            <small class="text-muted">Lisans / Üniversite</small>
                        </div>
                        <div class="form-group">
                            <label for="school_date">Okul Zamanı*</label>
                            <input type="text" class="form-control" id="school_date" name="school_date"
                                   placeholder="Okul Zamanı">
                            <small class="text-muted">2017 - 2022</small>
                        </div>
                        <div class="form-group">
                            <label for="status">Okul Gösterim Durumu*</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Pasif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="school_description">Okul Açıklaması*</label>
                            <textarea class="form-control" name="school_description" id="school_description"
                                      rows="4"></textarea>
                            <small class="text-muted">Yazılım mühendisliği kazanarak okula kayıt yaptırdım.</small>
                        </div>
                        <small class="text-danger">* Zorunlu alan</small>
                        <button type="button" id="educationAddButton" class="btn btn-primary mr-2 btn-block">Ekle
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#educationAddButton').click(function () {
                const form = $('#educationAddForm');
                const school_date = $('#school_date').val().trim();
                const school_name = $('#school_name').val().trim();
                const school_tag = $('#school_tag').val().trim();
                const school_description = $('#school_description').val().trim();
                const status = $('#status').val().trim();

                if (school_date === "" || school_name === "" || school_tag === "" || school_description === "" || status === "") {
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
