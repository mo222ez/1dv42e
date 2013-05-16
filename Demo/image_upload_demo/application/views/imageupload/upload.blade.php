<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	{{ Form::open_for_files(URL::to_route('upload')) }}
		<h3>Ladda upp bild</h3>
		<p>{{ Form::file('image') }}</p>
		<p>{{ Form::submit('Ladda upp') }}</p>
	{{ Form::close() }}
</body>
</html>