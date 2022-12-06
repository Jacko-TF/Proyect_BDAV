@extends('adminlte::page')

@section('title', 'ProyectBDAV')

@section('content_header')
    <h1>Visitantes</h1>
@stop

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('visitante.create') }}"> Crear nuevo visitante</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Hora</th>
            <th>Fecha</th>
            <th>Duracion Minutos</th>
            <th>Ip</th>
            <th>Navegador</th>
            <th>Sistema Operativo</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($visitantes as $visitante)
        <tr>
            <td>{{ $visitante->visitante_id }}</td>
            <td>{{ $visitante->hora }}</td>
            <td>{{ $visitante->fecha }}</td>
            <td>{{ $visitante->duracion_minutos }}</td>
            <td>{{ $visitante->ip }}</td>
            <td>{{ $visitante->navegador }}</td>
            <td>{{ $visitante->sistema_operativo }}</td>
            <td>{{ $visitante->pais }}</td>
            <td>{{ $visitante->ciudad }}</td>
            <td>
                <form action="{{ route('visitante.destroy',$visitante->visitante_id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('visitante.edit',$visitante->visitante_id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop