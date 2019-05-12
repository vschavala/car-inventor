@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <manufaturer-component :errors = {{$errors}}></manufaturer-component>
</div>
@endsection