<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin | Login </title>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{url('')}}/public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('')}}/public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('')}}/public/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition login-page">
	<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="box">
        <div class="box-body">
        @if(Session::has('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('success')}}
          </div>
        @endif
        @if(Session::has('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('error')}}
          </div>
          @endif
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset Password</p>

      <form action="{{ route('post.admin.forgot') }}" method="POST" role="form">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if($errors->has('email'))
    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
		    @endif
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<script src="{{url('')}}/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('')}}/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/public/admin/dist/js/adminlte.min.js"></script>
	</body>
</html>
