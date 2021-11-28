@extends('layouts.app')
@section('title', 'Page Title')
@section('heading', 'Horolezectvo')
@section('content')
    <style>
        /* Add padding to containers */
        .register {
            padding: 16px;
            background-color: white;

        }

        /* Full-width input fields */
        .register input[type=text],
        .register input[type=email],
        .register input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .register input[type=text]:focus,
        .register input[type=email]:focus,
        .register input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        .register a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

    </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="register">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <div>
                <label for="name"><b>Name</b></label>

                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email"><b>E-mail</b></label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required />
            </div>

            <!-- Password -->
            <div>
                <label for="password"> <b>Password </b></label>

                <input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation"><b>Confirm password </b></label>

                <input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>

            <div class="container signin">
                <button class="registerbtn" type="submit">
                    Register
                </button>

                <a href="{{ route('login') }}">
                    Already registered?
                </a>

            </div>
        </div>
    </form>
@endsection
