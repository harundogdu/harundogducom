@extends('layouts.admin')
@section('title')
    Portfolyo
@endsection
@section('css')
@endsection
@section('content')

    <div class="page-header">
        <h3 class="page-title"> Portfolyo </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Portfolyo</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('portfolio.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Yeni Portfolyo Ekle
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Portfolyo Bilgileri Listesi</h4>
                    <p class="card-description">Sistemde kayıtlı portfolyo bilgileriniz.</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Resim </th>
                                <th> Başlık</th>
                                <th> Etiketler</th>
                                <th> Seçili Etiket</th>
                                <th> Açıklama</th>
                                <th> Adres</th>
                                <th title="Okul bilgisinin ana ekranda görünmesi"> Durum</th>
                                <th> Sıra</th>
                                <th> Eylemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($portfolios as $portfolio)
                                <tr>
                                    <td>{{$portfolio->id}}</td>
                                    <td><img src="{{asset('storage/'.$portfolio->image)}}" alt="{{$portfolio->title}}"></td>
                                    <td>{{$portfolio->title}}</td>
                                    <td>{{$portfolio->tags}}</td>
                                    <td>{{$portfolio->featuredTag}}</td>
                                    <td title="{{$portfolio->description}}">
                                        {{ \Illuminate\Support\Str::limit($portfolio->description,15) }}
                                    </td>
                                    <td><a href="{!! $portfolio->href !!}" target="_blank">İncele</a></td>
                                    <td>
                                        @if ($portfolio->status)
                                            <button data-id="{{$portfolio->id}}"
                                                    class="btn btn-success changeStatus w-100">Aktif
                                            </button>
                                        @else
                                            <button data-id="{{$portfolio->id}}"
                                                    class="btn btn-danger changeStatus w-100">Pasif
                                            </button>
                                        @endif
                                    </td>
                                    <td>{{$portfolio->order}}</td>
                                    <td>
                                        <form style="display: inline-block;"
                                              action="{{route('portfolio.destroy',$portfolio->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                                Sil
                                            </button>
                                        </form>
                                        <a href="{{route('portfolio.edit',$portfolio->id)}}"
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
                const portfolioID = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('portfolio.change-status')}}',
                    type: 'POST',
                    async: false,
                    data: {
                        id: portfolioID
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
