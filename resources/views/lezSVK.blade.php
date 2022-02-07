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

                    </div>

                    <button class="log-button" id="btn{{ $item->id }}"> Zobraziť komentáre</button>
                    <div id="modal{{ $item->id }}" class="modal">
                        <div class="modal-content">
                            <span id="close{{ $item->id }}" class="close">&times;</span>
                            <div class="komentare">
                                <h1>Komentáre k článku {{ $item->nazov }}</h1>
                                @foreach ($comments as $itemComment)
                                    @if ($itemComment->locations_id == $item->id)
                                        <div class="komentar">
                                            <h2>{{ $itemComment->user_name }} {{ $itemComment->created_at }}</h2>

                                            <p>{{ $itemComment->text }}</p>

                                            @if ($itemComment->user_id == Auth::id() || Auth::id() == 1)
                                                <a href="delete-comment/{{ $itemComment->id }}"
                                                    class="deleteButton {{ $itemComment->id }}">X</a>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="komentovat"> @auth
                                    <textarea id="comment-area{{ $item->id }}" name="text"
                                        style="resize: none; max-width: 100%; width: 100%;height: 100px"></textarea>
                                    <div>
                                        <button class='log-button' id="addCommentBtn{{ $item->id }}"
                                            type="button">KOMENTOVAŤ</button>
                                    </div>

                                    <script>
                                        var btn{{ $item->id }} = document.getElementById("addCommentBtn" + {{ $item->id }});
                                        var text{{ $item->id }} = document.getElementById("comment-area" + {{ $item->id }});
                                        btn{{ $item->id }}.addEventListener("click", function() {
                                            axios
                                                .post("/api/comments", {
                                                    locations_id: parseInt({{ $item->id }}),
                                                    text: text{{ $item->id }}.value,
                                                })
                                                .then(function(response) {
                                                    console.log(response);
                                                    text{{ $item->id }}.value = "";
                                                    location.reload();
                                                })
                                                .catch(function(error) {
                                                    console.log(error);
                                                });

                                        })
                                    </script>
                                @endauth
                            </div>


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
            <script>
                var modal{{ $item->id }} = document.getElementById("modal" + {{ $item->id }});
                var btn{{ $item->id }} = document.getElementById("btn" + {{ $item->id }});
                var span{{ $item->id }} = document.getElementById("close" + {{ $item->id }});
                if (btn{{ $item->id }} != null) {
                    btn{{ $item->id }}.onclick = function() {
                        modal{{ $item->id }}.style.display = "block";
                    };
                }

                if (span{{ $item->id }} != null) {
                    span{{ $item->id }}.onclick = function() {
                        modal{{ $item->id }}.style.display = "none";
                    };
                }
                window.onclick = function(event) {
                    if (event.target == modal{{ $item->id }}) {
                        modal{{ $item->id }}.style.display = "none";
                    }
                };
            </script>
        @endforeach

        @if (Auth::id() == 1)
            <a href="pridaj-lokaciu" id="addButton"><i class="large material-icons">add</i></a>
        @endif

    </section>
@endsection
