@extends('adminlte::page')

@section('title', 'BDAV')

@section('content_header')
    @if (Route::has('login'))
                    @auth
                        <h1>BIENVENIDO</h1>
                        <!--<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>-->
                    @else
                        <a href="{{ route('login') }}" class="btn2 btn-back">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn2 btn-back">Register</a>              
                        @endif
                    @endauth
            @endif
@stop

@section('content')
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Stock de productos</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="myChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
              </div>
            </div>
        </div>

        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Los navegadores más usados</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="myChart2" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
              </div>
            </div>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
      /*Button hover effects using the background property. By creating a hard gradient as the background, you can create a lot of different effects by shifting the background into place! The 'regular button' uses the box-shadow effect found in my other pen, where it is called the glow effect.*/
        @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic);
        
        .btn2 {
          font-family: "Lato";
          text-transform: uppercase;
          font-weight: 300;
          border-radius: 2px;
          background-color: transparent;
          border: 3px solid #333;
          padding: 6px 12px;
          transition: all 0.5s ease;
          cursor:pointer;
        }
        .btn2:hover,
        button:hover {
          outline: 0;
          color: #fff;
        }
        .btn2:active,
        button:active {
          outline: 0;
          color: #fff;
        }
        .btn-back {
          padding: 0.7em 1.5em;
          border: none;
          color: #fff;
          background: linear-gradient(to right, #95a5a6 50%, #7f8c8d 50%);
          background-size: 200% 100%;
          background-position: left bottom;
        }
        .btn-back:hover {
          background-position: right bottom;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script> console.log('Hi!'); </script>
    <script>  
                arrayx = [];
                arrayy = [];
    </script>
    @foreach($products as $product)  
              <script>  
                producto = ("<?php echo $product-> nombre ?>");
                precio = (<?php echo $product-> stock ?>);
                arrayx.push(producto);
                arrayy.push(precio);
                console.log(arrayx);
                console.log(arrayy);
              </script>
    @endforeach 
        <script>
          const ctx = document.getElementById('myChart');

          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: arrayx,
              datasets: [{
                label: 'STOCK',
                data: arrayy,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 205, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                  'rgb(255, 99, 132)',
                  'rgb(255, 159, 64)',
                  'rgb(255, 205, 86)',
                  'rgb(75, 192, 192)',
                  'rgb(54, 162, 235)',
                  'rgb(153, 102, 255)',
                  'rgb(201, 203, 207)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        </script>

         <script>
          const ctx2 = document.getElementById('myChart2');
          
              new Chart(ctx2, {
                  type: 'doughnut',
                  data: {
                      <?php
                          $labels = "";
                          $data = "";
                          foreach ($navegadores as $navegador) {
                              $labels .= "'".$navegador->navegador."',";
                              $data .= $navegador->cantidad.",";
                          }
                      ?>
                      labels: [<?php echo $labels ?>],
                      datasets: [{
                          label: 'Visitantes',
                          data: [<?php echo $data ?>],
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1
                          //reducir el tamaño del grafico

                      }]
                  },
                  options: {
                      scales: {
                          x: {
                              display: false,
                          },
                          y: {
                              display: false,
                          }
                      }
                  }
              });
            </script>
@stop