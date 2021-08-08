@extends('layouts.admin')
@section('title')
    Deneyim Bilgileri
@endsection
@section('css')
@endsection
@section('content')

    <div class="page-header">
        <h3 class="page-title"> Deneyim Bilgileri </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Deneyim Bilgileri</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('experience.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Yeni Deneyim Ekle
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Deneyim Bilgileri Listesi</h4>
                    <p class="card-description">Sistemde kayıtlı deneyim bilgileriniz.</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Meslek </th>
                                <th> Firma </th>
                                <th title="Deneyim bilgisinin ana ekranda görünmesi"> Deneyim Durumu</th>
                                <th> Deneyim Tarihi</th>
                                <th> Eylemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($experiences as $experience)
                                <tr>
                                    <td>{{$experience->id}}</td>
                                    <td>{{$experience->experience_job}}</td>
                                    <td>{{$experience->experience_company }}</td>
                                    <td>
                                        @if ($experience->status)
                                            <button data-id="{{$experience->id}}"
                                                    class="btn btn-success changeStatus w-100">Aktif
                                            </button>
                                        @else
                                            <button data-id="{{$experience->id}}"
                                                    class="btn btn-danger changeStatus w-100">Pasif
                                            </button>
                                        @endif
                                    </td>
                                    <td>{{$experience->experience_date}}</td>
                                    <td>
                                        <form style="display: inline-block;"
                                              action="{{route('experience.destroy',$experience->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                            >
                                                <i class="fas fa-trash"></i>
                                                Sil
                                            </button>
                                        </form>
                                        <a href="{{route('experience.edit',$experience->id)}}"
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
                const educationID = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('experience.change-status')}}',
                    type: 'POST',
                    async: false,
                    data: {
                        id: educationID
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'İşlem Başarılı!',
                            text: 'Deneyim Durumu Başarıyla Güncellendi!',
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
