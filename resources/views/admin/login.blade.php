@extends('layout.Login_master')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Fire</b>AWAY</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="/admin" method="post">
    @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usename" name='txt_user'>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name='txt_pass'>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop