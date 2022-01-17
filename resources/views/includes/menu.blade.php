<div class="menu" id="myMenu">
    <a href="{{ route('index') }}" class="{{ Request::is('index') ? 'active' : '' }}">
        <img class="karabina" src="{{ URL::asset('/image/carabiner.png') }}" width="60" height="30" alt="" /></a>
    <a href="{{ route('lezenie-na-slovensku') }}"
        class="{{ str_contains(request()->url(), '/lezenie-na-slovensku') ? 'active' : '' }}">Lezenie na Slovensku</a>
    <a href="{{ route('tutorials') }}"
        class="{{ str_contains(request()->url(), '/tutorials') ? 'active' : '' }}">Tutoriály</a>
    @auth
        <a href="{{ route('cesty') }}" class="{{ str_contains(request()->url(), '/cesty') ? 'active' : '' }}">Cesty</a>
    @endauth
    @auth

        <a href="{{ route('vybavenie') }}"
            class="{{ str_contains(request()->url(), '/vybavenie') ? 'active' : '' }}">Vybavenie</a>
    @endauth
    <button class="icon" id="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </button>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        @auth
            <a href="{{ route('profil') }}" class="{{ str_contains(request()->url(), '/profil') ? 'active' : '' }}"><i
                    class="far fa-user-circle"></i></a>
            <button id="logButton" type="submit">
                Log out
            </button>
        @endauth

    </form>

    @guest
        <a class=' log {{ str_contains(request()->url(), 'login') ? 'active' : '' }}' href="{{ route('login') }}">
            Log in
        </a>

        <a class=' log {{ str_contains(request()->url(), 'register') ? 'active' : '' }}'
            href="{{ route('register') }}">
            Register
        </a>
    @endguest
</div>
