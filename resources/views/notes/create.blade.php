@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Create a Note</h1>
		@include('partials/errors')
		<form method="POST" action="{{ url('notes') }}" class="form">
			{!! csrf_field() !!}
			<textarea name="note" class="form-control" placeholder="Escribe tu nota ...">{{ old('note') }}</textarea>
			<button type="submit" class="btn btn-primary">Create note</button>
		</form>
	</div>
</div>
@endsection
