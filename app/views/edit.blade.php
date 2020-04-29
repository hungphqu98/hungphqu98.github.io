<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo edit form</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<form action="" method="POST" class="form-inline" role="form">
		@csrf
		<div class="form-group">
			<label class="sr-only" for="">label</label>
			<input class="form-control" name="name" placeholder="Input field" value="{{$cat->name}}">
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Cập nhật</button>
	</form>
</body>
</html>