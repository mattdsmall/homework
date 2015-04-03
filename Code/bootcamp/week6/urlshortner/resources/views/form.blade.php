<!DOCTYPE html>
<html lang="en">
<head>
<title>URL Shortener</title>
<link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<div id="container">
<h2>Uber-Shortener</h2>

@if(Session::has('errors'))
<h3 class="error">{!! $errors->first('link') !!}</h3>
@endif

@if(Session::has('message'))
<h3 class="error">{!! $errors->first('message') !!}</h3>
@endif


{!! Form::open(array('url'=>'/','method'=>'post')) !!}
{!! Form::text('link',Input::old('link'),
array('placeholder'=>
'Insert your URL here and press enter!')) !!}
{!! Form::close() !!}
</div>
</body>
</html>