<header>
    <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto">
        <i class="text-{{$general->themeColor}} fas fa-share-alt btn-img"></i>Paylaş
    </button>
    <nav class="collapsible-nav" id="collapsible-nav">
        <a href="{{route('index')}}" class="nav-link {{\Illuminate\Support\Facades\Request::is('/') ? "active-$general->themeColor" : ''}}">Anasayfa</a>
        <a href="{{route('portfolio')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('portfolio') ? "active-$general->themeColor" : ''}}">Portfolyo</a>
        <a href="{{route('contact')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('contact') ? "active-$general->themeColor" : ''}}">İletişim</a>
    </nav>
    <button class="btn btn-menu-toggle btn-white rounded-circle hamburger-item" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><i class="text-{{$general->themeColor}} fas fa-bars"></i></button>
</header>
