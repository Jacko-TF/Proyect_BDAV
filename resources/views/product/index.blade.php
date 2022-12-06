@extends('adminlte::page')

@section('title', 'ProyectBDAV')

@section('content_header')
  <div class="panel-body">
          <div class="pull-left"><h3>Productos</h3>
  </div>
@stop

@section('content')
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('product.create') }}" class="btn btn-info" >Añadir Producto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped" style="text-align: center !important;">
             <thead>
               <th>Nombre</th>
               <th>Marca</th>
               <th>Precio Compra</th>
               <th>Precio Venta</th>
               <th>Stock</th>
               <th COLSPAN=2>ACCIONES</th>
             </thead>
             <tbody>
              @if($products->count())
              @foreach($products as $product)  
              <tr>
                <td>{{$product-> nombre}}</td>
                <td>{{$product-> marca}}</td>
                <td>{{$product-> precio_compra}}</td>
                <td>{{$product-> precio_venta}}</td>
                <td>{{$product-> stock}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ProductController@edit', $product->_id)}}" >Editar</a></td>
                <td>
                  <form action="{{action('ProductController@destroy', $product->_id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                  </form>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
