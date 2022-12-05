@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
{{ Session::get('mensaje') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif





<a href="{{url('boxeadores/create')}}" class="btn btn-primary" >Registrar Nuveo Boxeador</a>  <a href="{{url('boxeadores/show')}}" class="btn btn-primary" >Sorteo</a>   
<br>
<br>
<table class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <th>#</th> 
            <th>Foto</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Peso</th>
            <th>Categoria</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Club</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($boxeadores as $boxeador)
       
        <tr>
        <td>{{$boxeador->id}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$boxeador->Foto}}" width="100" alt="">
            </td>
            <td>{{$boxeador->Nombre}}</td>
            <td>{{$boxeador->Edad}}</td>
            <td>{{$boxeador->Peso}}</td>
            <td>{{$boxeador->Categoria}}</td>
            <td>{{$boxeador->Estado}}</td>
            <td>{{$boxeador->Municipio}}</td>
            <td>{{$boxeador->Club}}</td>
            <td>
               <a href="{{url('/boxeadores/'.$boxeador->id.'/edit')}}"class="btn btn-warning">

               Editar
               </a> 
           | 
           
            <form action="{{url('/boxeadores/'.$boxeador->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
            <input class="btn btn-danger"type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
            </form>

            </td>
        </tr>
       
        @endforeach
    </tbody>
</table>
<!-- {!!$boxeadores->links()!!} -->
</div>
@endsection