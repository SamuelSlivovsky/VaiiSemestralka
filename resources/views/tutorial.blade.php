@extends('layouts.app')


@section('content')

    <div class="sirka-stranky">
        <div class="ako-uzol">
            <h2>{{ $tutorials->nazov }}</h2>
            <button type="button" id="btnEditTutorial">Edit</button>
            <div class="clanok-uzol">
                <div class="text-ako-uzol">
                    <p>
                        {{ $tutorials->text }}
                    </p>
                </div>
                <div class="vid-uzol">
                    <iframe class="vid-resp" src={{ $tutorials->video }} style="border: 0" allowfullscreen></iframe>
                </div>
            </div>
        </div>


        <div id="editTutorialModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">

                <span id="closeEditTutorial" class="close">&times;</span>
                <div class="add-route-container">
                    @if (Session::get('success'))
                        {{ Session::get('success') }}
                    @endif
                    @if (Session::get('fail'))
                        fail
                    @endif
                    <form action="update-tutorial/{{ $tutorials->id }}" method="POST">
                        @csrf
                        <div>
                            <label for="nazov">Nazov</label><br>
                            <input id='nazov' type="text" name="nazov" value="{{ $tutorials->nazov }}"><br>
                            <span style="color: red">@error('nazov'){{ $message }} @enderror</span>
                        </div>
                        <div><label for="">Text</label><br>
                            <input type="text" name="text" value="{{ $tutorials->text }}"><br>
                            <span style="color: red">@error('text'){{ $message }} @enderror</span><br>
                        </div>
                        <div><label for="">Video</label><br>
                            <input type="text" name="video" value="{{ $tutorials->video }}"><br>
                            <span style="color: red">@error('video'){{ $message }} @enderror</span><br>
                        </div>
                        <div><label for="">Kod</label><br>
                            <input type="text" name="kod" value="{{ $tutorials->kod }}"><br>
                            <span style="color: red">@error('kod'){{ $message }} @enderror</span><br>
                        </div>
                        <div>
                            <button class='log-button' type="submit">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </section>

@endsection
