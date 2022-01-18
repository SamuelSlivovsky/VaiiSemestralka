@extends('layouts.app')


@section('content')
    <section class="sekcia">
        @foreach ($locations as $item)
            <div class="sirka-stranky">
                <div class="drevenik">
                    <h2>{{ $item->nazov }}@if (Auth::id() == 1)<a style="background: #f44336; margin-left: 1rem" href="delete-location/{{ $item->id }}" id="btnEditTutorial">X</a><a href="edit-location/{{ $item->id }}" id="btnEditTutorial">Edit</a>  @endif </h2>
                    <div class="clanok-drevenik">
                        <div class="obrazok">
                            <img src="{{ $item->obrazok }}" class="obr1" alt="oDrev">
                        </div>

                        <div class="drevenik-text">
                            <p>
                                {{ $item->text }}
                            </p>
                        </div>
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
