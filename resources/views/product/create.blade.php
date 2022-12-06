@extends('adminlte::page')

@section('title', 'ProyectBDAV')

@section('content_header')
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Producto</h3>
	</div>
@stop

@section('content')
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
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

			<div class="panel panel-default">
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('product.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row" style="max-width: 500px !important;">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del Producto" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="text" name="marca" id="marca" class="form-control input-sm" placeholder="Marca" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="number" name="precio_compra" step="0.01" id="precio_compra" class="form-control input-sm" placeholder="Precio Compra" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="number" name="precio_venta" step="0.01" id="precio_venta" class="form-control input-sm" placeholder="Precio Venta" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="number" name="stock" id="stock" class="form-control input-sm" placeholder="Stock" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('product.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>
			</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

