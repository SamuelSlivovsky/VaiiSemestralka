@extends('layouts.app')
@section('heading', 'Horolezectvo')
@section('content')
    <section class="full-page">
        <div class="add-route-container">

            @if (Session::get('success'))
                {{ Session::get('success') }}
            @endif
            @if (Session::get('fail'))
                fail
            @endif
            <form action="add" method="POST">
                @csrf
                <div>
                    <label for="name">Názov</label><br>
                    <input id='name' type="text" name="name"><br>
                    <span style="color: red">@error('name'){{ $message }} @enderror</span>
                </div>
                <div><label for="">Obtiažnosť</label><br>
                    <input type="text" name="difficulty"><br>
                    <span style="color: red">@error('difficulty'){{ $message }} @enderror</span><br>
                </div>
                <div>
                    <label for="">Typ výstupu</label><br>
                    <select class='ascend-type' name="ascendType">
                        @foreach (['top-rope', 'onsight', 'flash', 'redpoint'] as $value)
                            <option value="{{ $value }}" selected="selected">{{ $value }}</option>
                        @endforeach
                    </select>

                </div>
                <div><label for="">Dátum</label><br>
                    <input type="date" name="date"><br>
                    <span style="color: red">@error('date'){{ $message }} @enderror</span>
                </div>
                <div>
                    <label for="">Počet pokusov</label><br>
                    <input type="text" name="tries"><br>
                    <span style="color: red">@error('tries'){{ $message }} @enderror</span>
                </div>
                <div>
                    <button class='registerbtn' type="submit">SAVE</button>
                </div>
            </form>

        </div>
    </section>
@endsection
