@extends('sistema.sistema')
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome-all.css') }}">


<!--SEMANTIC CSS-->
<link rel="stylesheet" href="{{ asset('semantic/semantic.min.css') }}">
<!--SEMANTIC JS-->
<link rel="stylesheet" href="{{ asset('semantic/semantic.min.js') }}">
<!--MY STYLE CSS-->
<link rel="stylesheet" href="{{ asset('css/principalMorador.css') }}">
<!--jQuery-->
<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>

@section('principal-morador')
<div>
<h1>Morador</h1>
<div class="ui form">
  <div class="fields">
    <div class="field">
      <label>Apartamento</label>
      <input type="text">
    </div>
    <div class="field">
      <label>Nome</label>
      <input type="text">
    </div>
    <div class="field">
        <label class="hidden" for="">sda</label>
        <input type="submit" class="ui blue button" value="Consultar">
    </div>
  </div>
  
</div>
@stop