<section class="clients-section">
    <h6 class="section-subtitle text-{{$shareData['general']->themeColor}}">Ne Yapıyorum?</h6>
    <h2 class="section-title">Kullandığım Araçlar</h2>
    <div class="client-logos-wrapper">
        @foreach($data['clients'] as $client)
            <div class="client-logo">
                <img src="{{asset('storage/'.$client->image)}}" alt="logo_{{$client->id}} resmi" class="w-100" width="400" height="100">
            </div>
        @endforeach
    </div>
</section>
