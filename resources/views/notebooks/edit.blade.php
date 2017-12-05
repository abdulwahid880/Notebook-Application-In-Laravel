@extends('layouts.base')

@section('content')
<div class="container">
<h1>Edit notebook</h1>

<form action="/notebooks/{{$notebook->id}}" method="POST">
{{method_field('PUT')}}
	<div class="form-group">
		<label for="name">Notebook</label>
	<input type="text" name="name" class="form-control">
	
	</div>	
	<input type="submit" value="Done" class="btn btn-primary">
     {{csrf_field()}}

</form>

</div>
@endsection