@extends('adminlte::page')

@section('title', 'ProyectBDAV')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif
                @foreach ($visitante as $visitante)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Editar Visitante</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('visitante.update',$visitante->visitante_id) }}"  role="form">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Duracion Minutos:</strong>
                                            <input type="text" name="duracion_minutos" id="duracion_minutos" class="form-control input-sm" placeholder="Duracion Minutos" value="{{$visitante->duracion_minutos}}"required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Ip:</strong>
                                            <input type="text" name="ip" id="ip" class="form-control input-sm" placeholder="Ip" value="{{$visitante->ip}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Navegador:</strong>
                                            <input type="text" name="navegador" id="navegador" class="form-control input-sm" placeholder="Navegador" value="{{$visitante->navegador}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Sistema Operativo:</strong>
                                            <input type="text" name="sistema_operativo" id="sistema_operativo" class="form-control input-sm" placeholder="Sistema Operativo" value="{{$visitante->sistema_operativo}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Pais:</strong>
                                            <input type="text" name="pais" id="pais" class="form-control input-sm" placeholder="Pais" value="{{$visitante->pais}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Ciudad:</strong>
                                            <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="Ciudad" value="{{$visitante->ciudad}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                        <a href="{{ route('visitante.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    

