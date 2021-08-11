<section class="clients-section">
    <h6 class="section-subtitle text-{{$general->themeColor}}">Ne Yapıyorum?</h6>
    <h2 class="section-title">Kullandığım Araçlar</h2>
    <div class="client-logos-wrapper">
        @foreach($clients as $client)
            <div class="client-logo">
                <img src="{{asset('storage/'.$client->image)}}" alt="{{$client->image}}" class="w-100">
            </div>
        @endforeach
    </div>
</section>
