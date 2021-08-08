@extends('layouts.admin')
@section('title')
    Deneyim Bilgileri
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Deneyim Bilgileri Ekle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('experience.index')}}">Deneyim Bilgileri</a></li>
                <li class="breadcrumb-item active" aria-current="page">Deneyim Bilgileri Ekle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Deneyim Bilgileriniz</h4>
                    <p class="card-description"> Deneyim bilgilerinizi eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="experienceAddForm" method="POST"
                          action="{{route('experience.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="experience_job">Meslek Adı*</label>
                            <input type="text" class="form-control" id="experience_job" placeholder="Meslek Adı"
                                   name="experience_job">
                            <small class="text-muted">Laravel Backend Developer Intern</small>
                        </div>
                        <div class="form-group">
                            <label for="experience_company">Firma Adı*</label>
                            <input type="text" class="form-control" id="experience_company" name="experience_company"
                                   placeholder="Firma Adı">
                            <small class="text-muted">Epigra</small>
                        </div>
                        <div class="form-group">
                            <label for="experience_date">Deneyim Zamanı*</label>
                            <input type="text" class="form-control" id="experience_date" name="experience_date"
                                   placeholder="Deneyim Zamanı">
                            <small class="text-muted">2021 - Halen</small>
                        </div>
                        <div class="form-group">
                            <label for="status">Deneyim Gösterim Durumu*</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Pasif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="experience_description">Deneyim Açıklaması*</label>
                            <textarea class="form-control" name="experience_description" id="experience_description"
                                      rows="4"></textarea>
                            <small class="text-muted">Epigra şirketinde yaz stajımı tamamladım.</small>
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
                const form = $('#experienceAddForm');
                const experience_date = $('#experience_date').val().trim();
                const experience_job = $('#experience_job').val().trim();
                const experience_company = $('#experience_company').val().trim();
                const experience_description = $('#experience_description').val().trim();
                const status = $('#status').val().trim();

                if (experience_date === "" || experience_job === "" || experience_company === "" || experience_description === "" || status === "") {
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
