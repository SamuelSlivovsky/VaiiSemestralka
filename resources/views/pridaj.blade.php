@extends('layouts.app')

@section('content')
    <section class="full-page">
        @if (Request::is('pridaj-cestu'))
            <div class="add-route-container">
                @if (Session::get('success'))
                    {{ Session::get('success') }}
                @endif
                @if (Session::get('fail'))
                    fail
                @endif
                <form action="addR" method="POST">
                    @csrf
                    <div>
                        <label for="name">Názov</label><br>
                        <input id='name' type="text" name="name"><br>
                        <span style="color: red">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div><label for="">Obtiažnosť</label><br>
                        <input class="max-two-chars" type="text" name="difficulty"><br>
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
                        <button class='log-button' type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        @endif

        @if (Request::is('pridaj-eq'))

            <div class="add-route-container">
                @if (Session::get('success'))
                    {{ Session::get('success') }}
                @endif
                @if (Session::get('fail'))
                    fail
                @endif
                <form action="addE" method="POST">
                    @csrf
                    <div>
                        <label for="category">Kategoria</label><br>
                        <select class='category' name="category">
                            @foreach (['lezecky', 'istenie', 'karabina', 'sedak', 'prilba', 'vrecusko na magnezium', 'magnezium', 'lanp'] as $value)
                                <option value="{{ $value }}" selected="selected">{{ $value }}</option>
                            @endforeach
                        </select>
                        <span style="color: red">@error('category'){{ $message }} @enderror</span>
                    </div>
                    <div><label for="nazov">Nazov</label><br>
                        <input id='nazov' type="text" name="nazov"><br>
                        <span style="color: red">@error('nazov'){{ $message }} @enderror</span><br>
                    </div>
                    <div>
                        <label for="znacka">Znacka</label><br>
                        <input id='znacka' type="text" name="znacka"><br>
                        <span style="color: red">@error('znacka'){{ $message }} @enderror</span><br>
                    </div>
                    <div>
                        <label for="pocet">Počet </label><br>
                        <input type="text" name="pocet"><br>
                        <span style="color: red">@error('pocet'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button class='log-button' type="submit">SAVE</button>
                    </div>
                </form>

            </div>
        @endif

        @if (Request::is('pridaj-tutorial'))

            <div class="add-route-container">
                @if (Session::get('success'))
                    {{ Session::get('success') }}
                @endif
                @if (Session::get('fail'))
                    fail
                @endif
                <form action="addT" method="POST">
                    @csrf
                    <div><label for="nazov">Nazov</label><br>
                        <input id='nazov' type="text" name="nazov"><br>
                        <span style="color: red">@error('nazov'){{ $message }} @enderror</span><br>
                    </div>
                    <div>
                        <label for="text">Text</label><br>
                        <input id='text' type="text" name="text"><br>
                        <span style="color: red">@error('text'){{ $message }} @enderror</span><br>
                    </div>
                    <div>
                        <label for="video">Video</label><br>
                        <input type="text" name="video"><br>
                        <span style="color: red">@error('video'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <label for="kod">Kod</label><br>
                        <input type="text" name="kod"><br>
                        <span style="color: red">@error('kod'){{ $message }} @enderror</span>
                    </div>
                    <div>
                        <button class='log-button' type="submit">SAVE</button>
                    </div>
                </form>

            </div>
        @endif
    </section>

@endsection
