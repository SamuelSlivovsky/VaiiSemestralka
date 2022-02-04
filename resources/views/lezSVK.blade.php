@extends('layouts.app')


@section('content')
    <section class="sekcia">
        @foreach ($locations as $item)
            <div class="sirka-stranky">
                <div class="drevenik">
                    <h2>{{ $item->nazov }}@if (Auth::id() == 1)<a style="background: #f44336; margin-left: 1rem" href="delete-location/{{ $item->id }}" class="btnEditTutorial">X</a><a href="edit-location/{{ $item->id }}" class="btnEditTutorial">Edit</a>  @endif </h2>
                    <div class="clanok-drevenik">
                        <div class="obrazok">
                            <img src="{{ $item->obrazok }}" class="obr1" alt="oDrev">
                        </div>

                        <div class="drevenik-text">
                            <p>
                                {{ $item->text }}
                            </p>
                        </div>
                        @foreach ($comments as $itemComment)
                            @if ($itemComment->locations_id == $item->id)
                                <h1>{{ $itemComment->user_name }}</h1>
                                <p>
                                    {{ $itemComment->text }}
                                </p>
                            @endif
                        @endforeach

                        @if (Session::get('success'))
                            {{ Session::get('success') }}
                        @endif
                        @if (Session::get('fail'))
                            fail
                        @endif
                        <form action="addC/{{ $item->id }}" method="POST">
                            @csrf
                            <textarea name="text"></textarea>
                            <div>
                                <button class='log-button' type="submit">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clanok-drevenik">
                    <div class="clanok-drevenik mapa">
                        <div class="mapa-drev">
                            <iframe class="respon-mapa" src=" {{ $item->lokacia }}"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if (Auth::id() == 1)
            <a href="pridaj-lokaciu" id="addButton"><i class="large material-icons">add</i></a>
        @endif

    </section>
@endsection
