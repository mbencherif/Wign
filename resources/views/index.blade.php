@extends('layout.main')

@section('open_graph')
    @include('layout.openGraph', ['desc' => 'Wign er en online social tegnsprogsencyklopædi. Altså en form for tegnbank til tegnsprogsbrugere. Her kan du se, oprette og efterlyse tegn for en bestemt ord.'])
@stop

@section('extra_head_scripts')
<script>
$(function() {
    $( "#autoComplete" ).autocomplete({
        source: function(request, response) {
            $.getJSON("{{ URL::to('/all_words_json') }}/" + request.term, response)
        },
        minLength: 2,
        delay: 0,
        autoFocus: true,
    });
});
</script>
@stop

@section('content')

    <div class="buffer">
    @if(Session::has('message'))
        @if(Session::has('url'))
            <a href="{{ Session::get('url') }}">
        @endif
        <span class="msg--flash">{{ Session::get('message') }}</span>
        @if(Session::has('url'))
            </a>
        @endif
    @endif

    <img src="{{asset('images/wign_logo.png',env('HTTPS'))}}" alt="Wign logo" class="wign logo-index" width="269" height="85">
    <h1 class="headline">Social tegnsprogsencyklopædi</h1>
    @include('layout.search', ['randomWord' => $randomWord])

    <a href="http://duf.dk/tilskud-og-stoette/dufs-initiativstoette/"><img src="{{asset('images/duf-is.png',env('HTTPS'))}}" alt="DUFs intativstøtte logo" class="logo-index" style="margin-top:150px;" width="150"></a>

    </div>

    @include('layout.footer',['signCount' => $signCount])

@stop
