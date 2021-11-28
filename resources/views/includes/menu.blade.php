<div class="menu" id="myMenu">
    <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">
        <img class="karabina" src="{{ URL::asset('/image/carabiner.png') }}" width="60px" height="30px"
            alt="" /></a>
    <a href="lezenie-na-slovensku"
        class="{{ str_contains(request()->url(), '/lezenie-na-slovensku') ? 'active' : '' }}">Lezenie na Slovensku</a>
    <a href="tutorials" class="{{ str_contains(request()->url(), '/tutorials') ? 'active' : '' }}">Tutoriály</a>
    @auth
        <a href="cesty" class="{{ str_contains(request()->url(), '/cesty') ? 'active' : '' }}">Cesty</a>
    @endauth
    <button class="icon" id="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </button>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        @auth
            <button id="logButton">
                Log out
            </button>
        @endauth

    </form>

    @guest
        <a class=' log {{ str_contains(request()->url(), '/login') ? 'active' : '' }}' href="login">
            Log in
        </a>

        <a class=' log {{ str_contains(request()->url(), '/register') ? 'active' : '' }}' href="register">
            Register
        </a>
    @endguest








</div>
