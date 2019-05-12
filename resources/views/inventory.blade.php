@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <inventory-component :items="{{ $items }}"></inventory-component>
</div>
@endsection