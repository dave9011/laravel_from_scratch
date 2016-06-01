@extends('layout')

@section('content')

	@include('flash')

	<div class="page-header">
    	<h1>All My Cards</h1>
    	<p>A collection of lists I'm making for this project.</p>
    </div>

    <ul class="list-group">
    @foreach ($cards as $card)
    	<li class="list-group-item">
    		<a href="/cards/{{ $card->id }}">{{ $card->title }}</a>
    	</li>
    @endforeach
    </ul>
@stop