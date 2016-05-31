@extends('layout')

@section('content')

	<div class="row">

		<div class="col-md-6 col-md-offset-3">

			<h1>{{ $card->title }}</h1>
			<h5>created at: {{ $card->created_at }}</h5>

			<ul>
			@foreach ($card->notes as $note)
				<li class="list-group-item" style="overflow:hidden"> 
					<a href="#">{{ $note->user->username}}</a> - {{ $note->body }} 

					<a href="/notes/{{$note->id}}/edit" style="float:right" class="btn btn-default btn-sm" role="button">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
					</a>
				</li>
			@endforeach
			</ul>

			<hr>

			<h3>Add New Note</h3>

			<form method="POST" action="/cards/{{ $card->id }}/notes">

				<div class="form-group">
					<textarea name="body" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Note</button>
				</div>
			</form>

		</div>

	</div>

@stop