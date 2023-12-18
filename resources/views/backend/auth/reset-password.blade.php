<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ __('admin.Reset Password') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/bootstrap-rtl.min.css') }}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/custom-style.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <b>{{ __('admin.Forget Password') }}</b>
  </div>
  <!-- /.login-logo --> 
  <div class="card">
    <div class="card-body login-card-body">
        <div class="card-header">
            <h4>{{ __('admin.Create New Password') }}</h4>
        </div>
      
      <form action="{{ route("admin.reset-password.send") }}" method="POST"> 
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" tabindex="1" placeholder="{{ __('admin.Email Addess') }}" value="{{ @request()->email }}">
          <input type="hidden" class="form-control" name="token" tabindex="1" value="{{ $token }}">

          <div class="input-group-append">
            <span class="fa fa-envelope input-group-text"></span>
          </div>
        </div>
        <span>
            @error('email')
              <code>{{ $message }}</code>
            @enderror
        </span>
        
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="{{ __('admin.Password') }}">
            <div class="input-group-append">
              <span class="fa fa-key input-group-text"></span>
            </div>
        </div>
        <span>
            @error('password')
              <code>{{ $message }}</code>
            @enderror
        </span>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="admin.Confirm password">
            <div class="input-group-append">
              <span class="fa fa-key input-group-text"></span>
            </div>
          </div>

        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('admin.Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1 mt-2">
        <a href="{{ route('admin.forgot-password') }}">{{ __('admin.I forgot my password') }}</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
