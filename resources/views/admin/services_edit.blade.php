@extends('layouts.admin')
@section('title')
    Servis Bilgileri
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Servis Bilgileri Güncelle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('services.index')}}">Servis Bilgileri</a></li>
                <li class="breadcrumb-item active" aria-current="page">Servis Bilgileri Güncelle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Servis Bilgileriniz</h4>
                    <p class="card-description"> Servis bilgilerinizi eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="servicesAddForm" method="POST"
                          action="{{route('services.update',$service->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Servis Adı*</label>
                            <input type="text" class="form-control" id="title" placeholder="Servis Adı"
                                   name="title" value="{{$service->title}}">
                            <small class="text-muted">Web Tasarım</small>
                        </div>

                        <div class="form-group">
                            <label for="icon">Servis İkonu*</label>
                            <input type="text" class="form-control" id="icon" name="icon"
                                   placeholder="Servis İkonu" value="{{$service->icon}}">
                            <small class="text-muted">İkonlar için
                                <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free" target="_blank">
                                    Tıklayınız
                                </a>
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="status">Servis Gösterim Durumu*</label>
                            <select class="form-control" id="status" name="status">
                                <option @if($service->status === 0) selected  @endif value="0">Pasif</option>
                                <option @if($service->status === 1) selected @endif value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order">Servis Sırası*</label>
                            <input type="text" class="form-control" id="order" placeholder="Servis Sırası"
                                   name="order" value="{{$service->order}}">
                            <small class="text-muted">1 - 999</small>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Servis Açıklaması*</label>
                            <textarea class="form-control" name="subtitle" id="subtitle"
                                      rows="4" placeholder="Servis Açıklaması">{{$service->subtitle}}</textarea>
                            <small class="text-muted">Web grafik tasarımı, grafik tasarım alanı ile yakın ilişkili bir
                                konu olarak ele alınabilir ama kendi içerisinde ayrı bir dal olarak çok geniş bir alanı
                                işgal etmektedir</small>
                        </div>
                        <small class="text-danger">* Zorunlu alan</small>
                        <button type="button" id="servicesAddButton" class="btn btn-info mr-2 btn-block">Güncelle
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
                const title = $('#title').val().trim();
                const subtitle = $('#subtitle').val().trim();
                const icon = $('#icon').val()
                const order = $('#order').val().trim();
                const status = $('#status').val().trim();

                if (title === "" || subtitle === "" || icon === "" || order === "" || status === "") {
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
