@extends('layouts.app')
@section('heading', 'Horolezectvo')
@section('content')

    @auth

        <div class="table-wrapper">
            <div>
                <table class="fl-table">
                    <thead>
                        <th>nazov</th>
                        <th>obtiaznost</th>
                        <th>typ</th>
                        <th>datum</th>
                        <th>pokusy</th>
                    </thead>
                    <tbody>
                        @foreach ($paths as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->difficulty }}</td>
                                <td>
                                    <select class='ascend-type' data-id="{{ $item->id }}" name="ascendType">
                                        @foreach (['top-rope', 'onsight', 'flash', 'redpoint'] as $value)
                                            <option value="{{ $value }}" @if ($value == old('ascendType', $item->ascendType))
                                                selected="selected"
                                        @endif
                                        >{{ $value }}</option>
                        @endforeach
                        </select>
                        </td>
                        <td>{{ $item->date }}</td>
                        <td><input class='tries-input' data-id="{{ $item->id }}" type="number" value="{{ $item->tries }}">
                        </td>
                        <td><a href="delete/{{ $item->id }}" id="deleteButton">X</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div><a href="pridaj" id="addButton"><i class="large material-icons">add</i></a></div>
        </div>
    @endauth
@endsection
