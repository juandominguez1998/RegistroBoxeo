@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{url('/boxeadores')}}" enctype="multipart/form-data">
@csrf
@include('boxeadores.form',['modo'=>'Crear']);

</form>
</div>
@endsection
