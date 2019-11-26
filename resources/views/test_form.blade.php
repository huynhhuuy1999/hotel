	<form action="{{route('postform')}}" method="post">
		{{csrf_field()}}
		<input type="text" name="ten"><br>
		<input type="submit">
	</form>
