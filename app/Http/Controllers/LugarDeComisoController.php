<?php

namespace App\Http\Controllers;

use App\LugarDeComiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LugarDeComisoController extends Controller
{
    public function index(Request $request)
    {
        $lugardecomiso = DB::table('lugar_decomisos')
                        ->join('aduanas','aduanas.id','lugar_decomisos.id_aduana')
                        ->select('lugar_decomisos.id',
                                'aduanas.id as idAduana',
                                'aduanas.descripcion as nomAduana',
                                'lugar_decomisos.descripcion as nomLugar',
                                'lugar_decomisos.observacion',
                                'lugar_decomisos.estado')
                        ->orderBy('id','asc')
                        ->paginate(10);
        
        return [
            'pagination' => [
                'total'         => $lugardecomiso->total(),
                'current_page'  => $lugardecomiso->currentPage(),
                'per_page'      => $lugardecomiso->perPage(),
                'last_page'     => $lugardecomiso->lastPage(),
                'from'          => $lugardecomiso->firstItem(),
                'to'            => $lugardecomiso->lastItem(),
            
            ],
            'lugardecomiso' => $lugardecomiso
        ];
    }

    public function store(Request $request)
    {
        $idAduana = $request->aduana;
        $lugar = strtoupper($request->lugar);
        $observacion = strtoupper($request->observacion);

        $lugardecomiso = LugarDeComiso::create([
            'id_aduana' => $idAduana,
            'descripcion' => $lugar,
            'observacion' => $observacion,
            'estado' => 1
        ]);
        
        // return response()->json($request);
    }
}
