@extends('sistema.sistema')
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome-all.css') }}">


<!--SEMANTIC CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<!--SEMANTIC JS-->
<link rel="stylesheet" href="{{ asset('js/bootstrap.min.js') }}">
<!--MY STYLE CSS-->
<link rel="stylesheet" href="{{ asset('css/principalMorador.css') }}">
<!--jQuery-->
<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>

@section('view-principal')

@include('sistema.consultar.consultar')

<div id="principal-morador">
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop