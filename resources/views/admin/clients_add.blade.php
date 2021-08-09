@extends('layouts.admin')
@section('title')
    Araç Bilgileri
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Araç Bilgileri Ekle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Araç Bilgileri</a></li>
                <li class="breadcrumb-item active" aria-current="page">Araç Bilgileri Ekle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Araç Bilgileriniz</h4>
                    <p class="card-description"> Araç bilgilerinizi eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="servicesAddForm" method="POST" action="{{route('clients.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Araç Resmi*</label>
                            <input type="file" class="form-control" id="image" placeholder="Araç Resmi"
                                   name="image">
                            <small class="text-muted">Araç Resmi Seçin.</small>
                        </div>


                        <div class="form-group">
                            <label for="status">Araç Gösterim Durumu*</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Pasif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order">Araç Sırası*</label>
                            <input type="text" class="form-control" id="order" placeholder="Araç Sırası"
                                   name="order">
                            <small class="text-muted">1 - 999</small>
                        </div>

                        <small class="text-danger">* Zorunlu alan</small>
                        <button type="button" id="servicesAddButton" class="btn btn-primary mr-2 btn-block">Ekle
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
            $('#servicesAddButton').click(function () {
                const form = $('#servicesAddForm');
                const image = $('#image').val().trim();
                const order = $('#order').val().trim();
                const status = $('#status').val().trim();

                if (image === "" || order === "" || status === "") {
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
