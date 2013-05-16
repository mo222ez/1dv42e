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
	<h2>Alla bilder</h2>
	@if($images)
		<p>
			{{ HTML::link_to_route('new', 'Ladda upp bild') }}
		</p>
	@endif
	@forelse ($images as $image)
	    <p>
	    	{{ HTML::image('uploads/images/big/' . $image->name) }}
	    	{{ HTML::image('uploads/images/small/' . $image->name) }}
	    	{{ HTML::image('uploads/images/thumb/' . $image->name) }}
	    </p>
	@empty
	    <p>
	    	Inga bilder uppladdade. {{ HTML::link_to_route('new', 'Ladda upp bild') }}
	    </p>
	@endforelse
</body>
</html>