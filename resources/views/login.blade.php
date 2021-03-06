@extends('layouts.app')


@section('content')
    <section class="full-page">
        <div class="logContainer">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h1>Log in</h1>
                <hr>
                <!-- Email Address -->
                <br>
                <div>
                    <label for="email"> <b>E-mail</b></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required autofocus />
                </div>

                <!-- Password -->
                <div>
                    <label for="password"><b>Password</b> </label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" />
                    <span>@error('email'){{ $message }} @enderror</span>
                </div>

                <div>

                    <button class="log-button">
                        Log in
                    </button>
                </div>


            </form>
        </div>
    </section>
@endsection
