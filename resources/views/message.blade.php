@if(session()->has('login'))
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message')}}</div>
    @endif
        <?php session()->forget('message'); ?>
@else
<div class="alert alert-danger" role="alert">Login Require</div>
<?php 
die();
return redirect('admin'); ?>
@endif