<header>
    <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto">
        <img src="{{asset('frontend/assets/images/share.svg')}}"
             alt="share" class="btn-img">
        Paylaş
    </button>
    <nav class="collapsible-nav" id="collapsible-nav">
        <a href="{{route('index')}}" class="nav-link {{\Illuminate\Support\Facades\Request::is('/') ? 'active' : ''}}">HOME</a>
        <a href="{{route('resume')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('resume') ? 'active' : ''}}">RESUME</a>
        <a href="{{route('portfolio')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('portfolio') ? 'active' : ''}}">PORTFOLIO</a>
        <a href="{{route('blog')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('blog') ? 'active' : ''}}">BLOG</a>
        <a href="{{route('contact')}}"
           class="nav-link {{\Illuminate\Support\Facades\Request::is('contact') ? 'active' : ''}}">CONTACT</a>
    </nav>
    <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="{{asset('frontend/assets/images/hamburger.svg')}}" alt="hamburger"></button>
</header>
