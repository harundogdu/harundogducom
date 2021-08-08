@extends('layouts.admin')
@section('title')
    Sosyal Medya Bilgileri
@endsection
@section('css')
@endsection
@section('content')

    <div class="page-header">
        <h3 class="page-title"> Sosyal Medya Bilgileri </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Sosyal Medya Bilgileri</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('social-media.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Yeni Sosyal Medya Ekle
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Sosyal Medya Bilgileri Listesi</h4>
                    <p class="card-description">Sistemde kayıtlı sosyal medya bilgileriniz.</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Ad</th>
                                <th> Adres</th>
                                <th title="Okul bilgisinin ana ekranda görünmesi"> Sosyal Medya Durumu</th>
                                <th> İkon </th>
                                <th> Sıra </th>
                                <th> Eylemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($socials as $social)
                                <tr>
                                    <td>{{$social->id}}</td>
                                    <td>{{$social->name}}</td>
                                    <td>{{$social->href }}</td>
                                    <td>
                                        @if ($social->status)
                                            <button data-id="{{$social->id}}"
                                                    class="btn btn-success changeStatus w-100">Aktif
                                            </button>
                                        @else
                                            <button data-id="{{$social->id}}"
                                                    class="btn btn-danger changeStatus w-100">Pasif
                                            </button>
                                        @endif
                                    </td>
                                    <td>{!! $social->icon !!}</td>
                                    <td>{{$social->order}}</td>
                                    <td>
                                        <form style="display: inline-block;"
                                              action="{{route('social-media.destroy',$social->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                            >
                                                <i class="fas fa-trash"></i>
                                                Sil
                                            </button>
                                        </form>
                                        <a href="{{route('social-media.edit',$social->id)}}"
                                           class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                            Düzenle
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.changeStatus').click(function () {
                self = $(this);
                const socialID = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('social-media.change-status')}}',
                    type: 'POST',
                    async: false,
                    data: {
                        id: socialID
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'İşlem Başarılı!',
                            text: 'Sosyal Medya Durumu Başarıyla Güncellendi!',
                            confirmButtonText: 'Tamam'
                        })
                        if (response.status) {
                            self.removeClass('btn-danger').addClass('btn-success');
                            self[0].innerHTML = 'Aktif';
                        } else {
                            self.removeClass('btn-success').addClass('btn-danger');
                            self[0].innerHTML = "Pasif";
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'İşlem Başarısız!',
                            text: 'Bir Sorun Oluştu, Daha Sonra Tekrar Deneyiniz!',
                            confirmButtonText: 'Tamam'
                        })
                    }
                })
            })
        })
    </script>
@endsection
