@extends('layouts.master')
@section('contenido')
<div class="container">
    <form class="form-horizontal" action="/students/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label">Nombre Estudiante</label>
            <input type="text" name="name" class="form-control" placeholder="teclee nombre estudiante">
        </div>    
        <div class="form-group">
            <label for="email" class="control-label">Usuario</label>
            <select name="id_user" class="form-control">
            <option value="">Selecciona un Usuario</option>
            @foreach($Usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{$usuario->email}}</option>
            @endforeach
            </select>
        </div>    
        <div class="form-group">
            <label for="name" class="control-label">Maestro</label>
            <select name="id_teacher" class="form-control">
            <option value="">Selecciona un Maestro</option>
            @foreach($Teacher as $teacher)
            <option value="{{ $teacher->id }}">{{$teacher->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Nivel</label>
            <select name="id_level" class="form-control">
            <option value="">Selecciona un Nivel</option>
            @foreach($Level as $level)
            <option value="{{ $level->id }}">{{$level->name}}</option>
            @endforeach
            </select>
        </div>
                 
        <div class="form-group col-md-12">
            <a class="btn btn-secondary" href="{{ route('students.index') }}"> Regresar</a>
            <button type="submit" class="btn btn-success" name="Grabar">Grabar</button>
        </div>    
    </form>    
</div>
@endsection