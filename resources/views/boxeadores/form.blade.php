<h1>{{$modo}} Boxeador</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
 <ul>
   @foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

<br>
<div class="form-group">
<label for="Nombre">Nombre Completo</label>
    <input type="text" class="form-control"name="Nombre" value="{{isset($boxeador->Nombre)?$boxeador->Nombre:old('Nombre')}}" id="Nombre">
    </div>
    <div class="form-group">
    <label for="Edad">Edad</label>
    <input type="text" class="form-control" name="Edad" value="{{isset($boxeador->Edad)?$boxeador->Edad:old('Edad')}}" id="Edad">
    
    </div>
    <div class="form-group">
    <label for="Peso">Peso</label>
    <input type="text" class="form-control" name="Peso" value="{{isset($boxeador->Peso)?$boxeador->Peso:old('Peso')}}" id="Peso">
    
    </div>
    <div class="form-group">
    <label for="Categoria">Categoria</label>
    <input type="text" class="form-control" name="Categoria" value="{{isset($boxeador->Categoria)?$boxeador->Categoria:old('Categoria')}}" id="Categoria">
    
    </div>
    <div class="form-group">
    <label for="Estado">Estado</label>
    <input type="text" class="form-control" name="Estado" value="{{isset($boxeador->Estado)?$boxeador->Estado:old('Estado')}}" id="Estado">
    
    </div>
    <div class="form-group">
    <label for="Municipio">Municipio</label>
    <input type="text" class="form-control" name="Municipio" value="{{isset($boxeador->Municipio)?$boxeador->Municipio:old('Municipio')}}" id="Municipio">
    
    </div>
    <div class="form-group">
    <label for="Club">Club</label>
    <input type="text" class="form-control" name="Club" value="{{isset($boxeador->Club)?$boxeador->Club:old('Club')}}" id="Club">
    
    </div>
    <div class="form-group">
    <label for="Foto"></label>
    @if(isset($boxeador->Foto))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$boxeador->Foto}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto">
    <br>
    </div>
    <br>
    <input class="btn btn-success" type="submit" value="{{$modo}} datos">

    <a href="{{url('boxeadores/')}}" class="btn btn-primary">Regresar</a>
   