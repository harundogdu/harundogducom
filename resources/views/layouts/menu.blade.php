<header>
    <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto">
        <img src="{{asset('frontend/assets/images/share.svg')}}"
             alt="share" class="btn-img">
        Paylaş
    </button>
    <nav class="collapsible-nav" id="collapsible-nav">
        <a href="{{route('index')}}" class="nav-link {{\Illuminate\Support\Facades\Request::is('/') ? 'active' : ''}}">Anasayfa</a>
        <a href="{{route('portfolio')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('portfolio') ? 'active' : ''}}">Portfolyo</a>
        <a href="{{route('contact')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('contact') ? 'active' : ''}}">İletişim</a>
    </nav>
    <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="{{asset('frontend/assets/images/hamburger.svg')}}" alt="hamburger"></button>
</header>
