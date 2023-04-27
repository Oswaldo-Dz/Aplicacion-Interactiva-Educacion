@extends('layouts.master')
@section('contenido')
    <div class="row">
        <a href="{{route('students.create')}}" class="btn  btn-sm btn-primary">Agregar Estudiante</a>
    </div>
    <table class="table table-sm table-bordered table-stripped">
        <thead class="table-primary">
            <tr>
                <th></th>
            <th>Usuario</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Maestro</th>
            <th>Nivel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Students as $student)
            <tr id="row_{{$student->id}}">
             <td><a href="{{route('students.edit',$student->id)}}"><i class="fa fa-edit fa-2x text-blue"></i></a> 
                <a href="#"><i  id="{{$student->id}}" class="fa fa-trash-alt fa-2x text-red delete"></i></a></td>   
             <td>{{ $student->Usuarios->email}}</td>
             <td>{{ $student->id}}</td>
             <td>{{ $student->name}}</td>
             <td>{{ $student->Teacher->name}}</td>
             <td>{{ $student->Level->name}}</td>
            </tr>
            @endforeach
        </tbody>
        {{-- <tfoot>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Fecha Nac</th>
                </tr>            
        </tfoot> --}}
    </table>
    <script>
        $(".delete").on('click', function(){
            let ID = $(this).attr('id')
            if (confirm('Are you sure you want to delete this')){
            $.post('/students/delete/'+ID,
                     {"_method":"delete","_token":"{{@csrf_token()}}"},
            function(response){
                if (response.Error===0){
                    alert('Borrado')
                    $("#row_"+ID).remove()
                }
            })
            }
        
        })
    </script>
@endsection