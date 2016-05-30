@extends('layout')

@section('content')
	<h1>{{ $card->title }}</h1>
	<h3>created at: {{ $card->created_at }}</h3>

	<ul>
	@foreach ($card->notes as $note)
		<li> {{ $note->body }} </li>
	@endforeach
	</ul>

@stop