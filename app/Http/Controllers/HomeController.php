<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\DB;
use App\Models\Visitante;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $products = Product::all();
        $navegadores = DB::connection('mysql')->select('select navegador, count(navegador) as cantidad from visitantes group by navegador');
        return view('admin',compact('products','navegadores'));
    }
}