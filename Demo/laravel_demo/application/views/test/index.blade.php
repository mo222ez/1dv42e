<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Test</title>
	<meta name="viewport" content="width=device-width">
</head>
<body>
	{{ $user->email }}
	<br/>
	<br/>
	{{ $user->password }}
	<br/>
	<br/>
	<h2>Information</h2>
	@foreach($user->details as $detail)
		{{ $detail->detailtype_id }} - {{ $detail->detailtype->name }} - {{ $detail->value }}
		<br/>
		<br/>
	@endforeach
	<br/>
	<br/>

	<!--{{ var_dump($user->relationships) }}-->

	<!--{{ var_dump($user->details[0]->relationships) }}-->
</body>
</html>
