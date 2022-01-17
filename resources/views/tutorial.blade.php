@extends('layouts.app')


@section('content')

    <div class="sirka-stranky">
        <div class="ako-uzol">
            <h2>{{ $tutorials->nazov }}</h2>
            <button type="button" id="tutorialEditBtn">Edit</button>
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


        {{-- <div id="editTutorialModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">

                <span id="closeEdit" class="close">&times;</span>
                <div class="add-route-container">
                    @if (Session::get('success'))
                        {{ Session::get('success') }}
                    @endif
                    @if (Session::get('fail'))
                        fail
                    @endif
                    <form action="updateTutorial" method="POST">
                        @csrf
                        <div>
                            <label for="name">Meno</label><br>
                            <input id='name' type="text" name="name"><br>
                            <span style="color: red">@error('name'){{ $message }} @enderror</span>
                        </div>
                        <div><label for="">Email</label><br>
                            <input type="text" name="email"><br>
                            <span style="color: red">@error('email'){{ $message }} @enderror</span><br>
                        </div>
                        <div>
                            <button class='log-button' type="submit">SAVE</button>
                        </div>
                    </form>
                </div>
            </div> --}}

        </div>
    </div>
    </section>

@endsection
