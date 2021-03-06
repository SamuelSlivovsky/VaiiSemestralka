@extends('layouts.app')

@section('content')

    @auth
        <section class="full-page">
            <div class="table-wrapper">
                <div>
                    <table class="fl-table">
                        <thead>
                            <tr>
                                <th>nazov</th>
                                <th>obtiaznost</th>
                                <th>typ</th>
                                <th>datum</th>
                                <th>pokusy</th>
                            </tr>
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
                            <td><input id="only-numbers" class='tries-input' data-id="{{ $item->id }}" type="number"
                                    value="{{ $item->tries }}">
                                <span id="error-tries" style="color: red">@error('tries'){{ $message }} @enderror</span>
                            </td>
                            <td><a href="delete/{{ $item->id }}" id="deleteButton">X</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div><a href="pridaj-cestu" id="addButton"><i class="large material-icons">add</i></a></div>
            </div>
        </section>
    @endauth
@endsection
