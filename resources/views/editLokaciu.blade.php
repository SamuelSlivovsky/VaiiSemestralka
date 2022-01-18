@if (Auth::id() == 1)
    @extends('layouts.app')
    @section('content')
        <section class="sekcia full-page">
            <div class="add-route-container">
                @if (Session::get('success'))
                    {{ Session::get('success') }}
                @endif
                @if (Session::get('fail'))
                    fail
                @endif
                <form action="update-location/{{ $locations->id }}" method="POST">
                    @csrf
                    <div>
                        <label for="nazov">Nazov</label><br>
                        <input id='nazov' type="text" name="nazov" value="{{ $locations->nazov }}"><br>
                        <span style="color: red">@error('nazov'){{ $message }} @enderror</span>
                    </div>
                    <div><label>Text</label><br>
                        <textarea name="text">{{ $locations->text }} </textarea><br>
                        <span style="color: red">@error('text'){{ $message }} @enderror</span><br>
                    </div>
                    <div><label>Obrazok</label><br>
                        <input type="text" name="obrazok" value="{{ $locations->obrazok }}"><br>
                        <span style="color: red">@error('obrazok'){{ $message }} @enderror</span><br>
                    </div>
                    <div><label>Lokacia</label><br>
                        <input type="text" name="lokacia" value="{{ $locations->lokacia }}"><br>
                        <span style="color: red">@error('lokacia'){{ $message }} @enderror</span><br>
                    </div>
                    <div>
                        <button class='log-button' type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </section>
    @endsection
@endif
