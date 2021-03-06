@extends('layouts.app')


@section('content')
    @auth

        <section class="full-page">
            <div class="profil">
                @foreach ($users as $item)

                    <h1> Vitaj vo svojom profile {{ $item->name }}</h1>
                @endforeach
                <button class="log-button" id="btnEdit"> Edit</button>
                <button class="log-button" id="btnDelete"> Delete</button>

                <div id="editModal" class="modal">

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
                            <form action="update" method="POST">
                                @csrf
                                <div>
                                    <label for="name">Meno</label><br>
                                    <input id='name' type="text" name="name" value="{{ $item->name }}"><br>
                                    <span style="color: red">@error('name'){{ $message }} @enderror</span>
                                </div>
                                <div><label for="email">Email</label><br>
                                    <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        value="{{ $item->email }}"><br>
                                    <span style="color: red">@error('email'){{ $message }} @enderror</span><br>
                                </div>
                                <div>
                                    <button class='log-button' type="submit">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div id="deleteModal" class="modal">

                    <!-- Modal content -->
                    <div class="delete modal-content">
                        <span id="closeDelete" class="close">&times;</span>
                        <p>Ste si ist?? ??e si chcete vymaza?? profil?</p>
                        <a href="delete-profile" class="log-button">Ano</a>
                        <a href="profil" class="log-button">Nie</a>
                    </div>

                </div>
            </div>

        </section>
    @endauth
@endsection
