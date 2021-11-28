@extends('layouts.app')

@section('title', 'Page Title')
@section('heading', 'Horolezectvo')
@section('content')

    @auth
        <section class="tabulka">

            <table>
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
                                <select name="ascendType">
                                    @foreach (['top-rope', 'onsight', 'flash', 'redpoint'] as $value)
                                        <option class = 'ascend-type' value="{{ $value }}" @if ($value == old('ascendType', $item->ascendType))
                                            selected="selected"
                                    @endif
                                    >{{ $value }}</option>
                    @endforeach
                    </select>
                    </td>
                    <td>{{ $item->date }}</td>
                    <td><input class='tries-input' data-id="{{ $item->id }}" type="number" value="{{ $item->tries }}">
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endauth
@endsection
