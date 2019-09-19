@extends('layouts.app2')

@section('content')
    <div id="app">
        <battle-component/>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
@endsection