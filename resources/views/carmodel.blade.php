
@extends('layouts.app')

@section('content')
<div class="container" id="app">
   <car-model :items="{{ $items }}"></car-model>
    
</div>
@endsection