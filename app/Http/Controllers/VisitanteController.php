<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visitante;

class VisitanteController extends Controller
{
    //Procedimientos almacenados para el CRUD
    /*public function __construct(){
        DB::setDefaultConnection("mysql");
    }*/

    public function index()
    {
        $visitantes = DB::connection('mysql')->select('call sp_consultar_visitas');
        return view('visitante.index', compact('visitantes'));
        //return $visitantes;
    }

    public function create()
    {
        return view('visitante.create');
    }

    public function store(Request $request)
    {
        $visitante = new Visitante();
        $visitante->duracion_minutos = $request->duracion_minutos;
        $visitante->ip = $request->ip;
        $visitante->navegador = $request->navegador;
        $visitante->sistema_operativo = $request->sistema_operativo;
        $visitante->pais = $request->pais;
        $visitante->ciudad = $request->ciudad;
        DB::connection('mysql')->select('call sp_insertar_visita(?,?,?,?,?,?)', array(
            $visitante->duracion_minutos,
            $visitante->ip,
            $visitante->navegador,
            $visitante->sistema_operativo,
            $visitante->pais,
            $visitante->ciudad
        ));
        return redirect()->route('visitante.index');
    }


    public function show($id)
    {
        DB::connection('mysql')->select('call sp_consultar_visita(?)', array($id));
        return view('visitante.show');
    }

    public function edit($id)
    {
        $visitante = DB::connection('mysql')->select('call sp_consultar_visita(?)', array($id));
        return view('visitante.edit', compact('visitante'));
        return $visitante;
    }

    public function update(Request $request, $visitante_id)
    {
        $visitante = new Visitante();
        $visitante->duracion_minutos = $request->duracion_minutos;
        $visitante->ip = $request->ip;
        $visitante->navegador = $request->navegador;
        $visitante->sistema_operativo = $request->sistema_operativo;
        $visitante->pais = $request->pais;
        $visitante->ciudad = $request->ciudad;
        DB::connection('mysql')->select('call sp_actualizar_visita(?,?,?,?,?,?,?)', array(
            $visitante_id,
            $visitante->duracion_minutos,
            $visitante->ip,
            $visitante->navegador,
            $visitante->sistema_operativo,
            $visitante->pais,
            $visitante->ciudad
        ));
        return redirect()->route('visitante.index');
    }

    public function destroy($id)
    {
        DB::connection('mysql')->select('call sp_eliminar_visita(?)', array($id));
        return redirect()->route('visitante.index');
    }
    
}