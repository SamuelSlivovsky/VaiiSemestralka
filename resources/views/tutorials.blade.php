@extends('layouts.app')


@section('content')

    <section class="sekcia">
        <div class="table-tutorial full-page">
            <div>
                <table class="fl-table tutorials">
                    <thead>
                        <tr>
                            <th>Tutorial</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutorials as $item)
                            <tr>
                                <td><a href="tutorial/{{ $item->id }}">{{ $item->nazov }}</a></td>
                                @if (Auth::id() == 1)
                                    <td><a href="delete-tutorial/{{ $item->id }}" id="deleteButton">X</a></td>
                                @endif
                        @endforeach
                        </tr>
                    </tbody>
                </table>

            </div>
            @if (Auth::id() == 1)
                <div><a href="pridaj-tutorial" id="addTutorialButton"><i class="large material-icons">add</i></a></div>
            @endif
        </div>
    </section>

@endsection
