@extends('layouts.app')


@section('heading', 'Horolezectvo')
@section('content')

    <div class="logContainer">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->

            <div>
                <label for="email"> E-mail</label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>

            <!-- Password -->
            <div>
                <label for="password"> Password</label>

                <input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div>
                <label for="remember_me">
                    <input id=" remember_me" type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        Forgout your password?
                    </a>
                @endif

                <button>
                    Log in
                </button>
            </div>

        </form>
    </div>
@endsection
