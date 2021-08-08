@extends('layouts.admin')
@section('title')
    Sosyal Medya Bilgileri Ekle
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Sosyal Medya Bilgileri Ekle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('social-media.index')}}">Sosyal Medya Bilgileri Ekle</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sosyal Medya Bilgileri Ekle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sosyal Medya Bilgileriniz</h4>
                    <p class="card-description"> Sosyal medya bilgilerinizi eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="socialMediaAddForm" method="POST"
                          action="{{route('social-media.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Sosyal Medya Adı*</label>
                            <input type="text" class="form-control" id="name" placeholder="Sosyal Medya Adı"
                                   name="name">
                            <small class="text-muted">Facebook</small>
                        </div>

                        <div class="form-group">
                            <label for="href">Sosyal Medya Adresi*</label>
                            <input type="text" class="form-control" id="href" name="href"
                                   placeholder="Sosyal Medya Adresi">
                            <small class="text-muted">https://www.facebook.com/harundogduuu/</small>
                        </div>

                        <div class="form-group">
                            <label for="icon">Sosyal Medya İkonu*</label>
                            <input type="text" class="form-control" id="icon" name="icon"
                                   placeholder="Sosyal Medya İkonu">
                            <small class="text-muted">İkonlar için
                                <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free" target="_blank">
                                    Tıklayınız
                                </a>
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="status">Sosyal Medya Durumu*</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Pasif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order">Sosyal Medya Sıralaması*</label>
                            <input type="text" class="form-control" id="order" name="order"
                                   placeholder="Sosyal Medya Sıralaması">
                            <small class="text-muted">1-999</small>
                        </div>

                        <small class="text-danger">* Zorunlu alan</small>
                        <button type="button" id="socialMediaAddButton" class="btn btn-primary mr-2 btn-block">Ekle
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
            $('#socialMediaAddButton').click(function () {
                const form = $('#socialMediaAddForm');
                const name = $('#name').val().trim();
                const href = $('#href').val().trim();
                const icon = $('#icon').val().trim();
                const order = $('#order').val().trim();
                const status = $('#status').val().trim();

                if (name === "" || href === "" || icon === "" || order === "" || status === "") {
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
