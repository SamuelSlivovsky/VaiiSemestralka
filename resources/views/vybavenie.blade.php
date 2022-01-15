@extends('layouts.app')

@section('content')

    @auth
        <section class="full-page">
            <div class="table-wrapper">
                <div>
                    <table class="fl-table">
                        <thead>
                            <tr>
                                <th>kategoria</th>
                                <th>nazov</th>
                                <th>znacka</th>
                                <th>pocet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipment as $item)
                                <tr>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->nazov }}</td>
                                    <td>{{ $item->znacka }}</td>
                                    <td>{{ $item->pocet }}</td>
                                    <td><a href="delete-eq/{{ $item->id }}" id="deleteButton">X</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div><a href="pridaj-eq" id="addButton"><i class="large material-icons">add</i></a></div>
            </div>
        </section>
    @endauth
@endsection
