@extends('layouts.base')

@section('content')
<div class="container">
<h1>Edit note</h1>

<form action="{{route("notes.update",$note->id)}}" method="POST">
{{method_field('PUT')}}
	<div class="form-group">
		<label for="Title">Note Title</label>
	<input type="text" name="title" class="form-control">
	
	</div>	

	<div class="form-group">
		<label for="body">Note Body</label>
	<input type="text" name="body" class="form-control">
	</div>
    
	<input type="submit" value="Done" class="btn btn-primary">
     {{csrf_field()}}

</form>

</div>
@endsection