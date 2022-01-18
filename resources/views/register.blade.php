@extends('layouts.app')
@section('content')
    <section class="full-page">
        <div class="regContainer">
            <form method="POST" action="{{ route('register') }}">
                @csrf

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
                    <button class="log-button" type="submit">
                        Register
                    </button>

                    <a href="{{ route('login') }}">
                        Already registered?
                    </a>

                </div>

            </form>
        </div>
    </section>
@endsection
