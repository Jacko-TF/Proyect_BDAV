@extends('adminlte::page')

@section('title', 'ProyectBDAV')

@section('content_header')
    <div class="panel-heading">
					<h3 class="panel-title">Editando Producto</h3>
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
						<form method="POST" action="/product/update/{{$product->id}}"  role="form">
							{{ csrf_field() }}
							<div class="row" style="max-width: 500px !important;">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<label>Nombre del Producto</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del Producto" value="{{$product->nombre}}" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<label>Marca</label>
										<input type="text" name="marca" id="marca" class="form-control input-sm" placeholder="Marca" value="{{$product->marca}}" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<label>Precio Compra</label>
										<input type="number" name="precio_compra" step="0.01" id="precio_compra" class="form-control input-sm" placeholder="Precio Compra" value="{{$product->precio_compra}}" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<label>Precio Venta</label>
										<input type="number" name="precio_venta" step="0.01" id="precio_venta" class="form-control input-sm" placeholder="Precio Venta" value="{{$product->precio_venta}}" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<label>Stock</label>
										<input type="number" name="stock" id="stock" class="form-control input-sm" placeholder="Stock" value="{{$product->stock}}" required>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
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
