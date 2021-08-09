@extends('layouts.admin')
@section('title')
    Portfolyo Güncelle
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Portfolyo Bilgileri Güncelle </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('portfolio.index')}}">Portfolyo Bilgileri</a></li>
                <li class="breadcrumb-item active" aria-current="page">Portfolyo Bilgileri Güncelle</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Portfolyo Bilgileriniz</h4>
                    <p class="card-description"> Portfolyo bilgilerinizi eksiksiz bir şekilde doldurunuz. </p>
                    <form class="forms-sample" id="portfoliosAddForm" method="POST"
                          action="{{route('portfolio.update',$portfolio->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Portfolyo Başlığı*</label>
                            <input type="text" class="form-control" id="title" placeholder="Portfolyo Başlığı"
                                   name="title" value="{{$portfolio->title}}">
                            <small class="text-muted">Oto Galeri Sitesi</small>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="image">Portfolyo Resmi*</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                           placeholder="Portfolyo Resmi">
                                    <small class="text-muted">Portfolyo Resmi</small>
                                </div>
                                <div class="col-md-5">
                                    <img src="{{asset('storage/'.$portfolio->image)}}" alt="{{$portfolio->title}}"
                                         class="w-75">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tags">Portfolyo Etiketleri*</label>
                            <input type="text" class="form-control" id="tags" name="tags"
                                   placeholder="Portfolyo Etiketleri" value="{{$portfolio->tags}}">
                            <small class="text-muted">Web,Logo,Kartvizit</small>
                        </div>

                        <div class="form-group">
                            <label for="featuredTag">Portfolyo Seçilen Etiket*</label>
                            <input type="text" class="form-control" id="featuredTag" name="featuredTag"
                                   placeholder="Portfolyo Seçilen Etiket" value="{{$portfolio->featuredTag}}">
                            <small class="text-muted">Web Tasarım</small>
                        </div>

                        <div class="form-group">
                            <label for="href">Portfolyo Adres*</label>
                            <input type="text" class="form-control" id="href" name="href"
                                   placeholder="Portfolyo Adres" value="{{$portfolio->href}}">
                            <small class="text-muted">https://harundogdu.com/</small>
                        </div>

                        <div class="form-group">
                            <label for="status">Portfolyo Gösterim Durumu*</label>
                            <select class="form-control" id="status" name="status">
                                <option @if($portfolio->status === 0) selected @endif value="0">Pasif</option>
                                <option @if($portfolio->status === 1) selected @endif value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order">Portfolyo Sırası*</label>
                            <input type="text" class="form-control" id="order" placeholder="Portfolyo Sırası"
                                   name="order" value="{{$portfolio->order}}">
                            <small class="text-muted">1 - 999</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Portfolyo Açıklaması*</label>
                            <textarea class="form-control" name="description" id="description"
                                      rows="4" placeholder="Portfolyo Açıklaması">{{$portfolio->description}}</textarea>
                            <small class="text-muted">Oto galeri için yaptığım website.</small>
                        </div>
                        <small class="text-danger">* Zorunlu alan</small>
                        <button type="button" id="portfoliosAddButton" class="btn btn-info mr-2 btn-block">Güncelle
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
            $('#portfoliosAddButton').click(function () {
                const form = $('#portfoliosAddForm');
                const title = $('#title').val().trim();
                const featuredTag = $('#featuredTag').val().trim();
                const tags = $('#tags').val().trim();
                const description = $('#description').val().trim();
                const href = $('#href').val().trim();
                const order = $('#order').val().trim();
                const status = $('#status').val().trim();

                if (title === "" || tags === "" || order === "" || status === "" || featuredTag === "" || description === "" || href === "") {
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
