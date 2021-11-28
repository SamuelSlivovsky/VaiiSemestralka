@extends('layouts.app')

@section('title', 'Page Title')
@section('heading', 'Horolezectvo')
@section('content')


    <style>
        /* Full-width inputs */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04aa6d;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Add padding to containers */
        .logContainer {
            padding: 16px;
        }

    </style>
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
                <label for="remember_me" ">
                                                                                        <input id=" remember_me"
                    type="checkbox" name="remember">
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
