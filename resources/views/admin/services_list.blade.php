@extends('layouts.admin')
@section('title')
    Hizmetler
@endsection
@section('css')
@endsection
@section('content')

    <div class="page-header">
        <h3 class="page-title"> Hizmetler </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Hizmetler</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('services.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Yeni Hizmet Ekle
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Hizmet Bilgileri Listesi</h4>
                    <p class="card-description">Sistemde kayıtlı hizmet bilgileriniz.</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Hizmet Başlığı</th>
                                <th> Hizmet Açıklaması</th>
                                <th title="Okul bilgisinin ana ekranda görünmesi"> Okul Durumu</th>
                                <th> Hizmet Sırası</th>
                                <th> Hizmet İkonu</th>
                                <th> Eylemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$service->id}}</td>
                                    <td>{{$service->title}}</td>
                                    <td title="{{$service->subtitle}}">{{ \Illuminate\Support\Str::limit($service->subtitle,25) }}</td>
                                    <td>
                                        @if ($service->status)
                                            <button data-id="{{$service->id}}"
                                                    class="btn btn-success changeStatus w-100">Aktif
                                            </button>
                                        @else
                                            <button data-id="{{$service->id}}"
                                                    class="btn btn-danger changeStatus w-100">Pasif
                                            </button>
                                        @endif
                                    </td>
                                    <td>{{$service->order}}</td>
                                    <td>{!! $service->icon !!}</td>
                                    <td>
                                        <form style="display: inline-block;"
                                              action="{{route('services.destroy',$service->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                            >
                                                <i class="fas fa-trash"></i>
                                                Sil
                                            </button>
                                        </form>
                                        <a href="{{route('services.edit',$service->id)}}"
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
                const servicesID = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('services.change-status')}}',
                    type: 'POST',
                    async: false,
                    data: {
                        id: servicesID
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'İşlem Başarılı!',
                            text: 'Okul Durumu Başarıyla Güncellendi!',
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
