<?php

namespace App\Http\Controllers;

use App\Aduana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AduanaController extends Controller
{
    public function index(Request $request)
    {
        $aduanas = DB::table('aduanas')
                        ->select('id',
                                'descripcion',
                                'observacion',
                                'estado')
                        ->orderBy('id','asc')
                        ->paginate(10);
        
        return [
            'pagination' => [
                'total'         => $aduanas->total(),
                'current_page'  => $aduanas->currentPage(),
                'per_page'      => $aduanas->perPage(),
                'last_page'     => $aduanas->lastPage(),
                'from'          => $aduanas->firstItem(),
                'to'            => $aduanas->lastItem(),
            
            ],
            'aduanas' => $aduanas
        ];

    }
    public function store(Request $request)
    {
        $nombre = strtoupper($request->aduana);
        $observacion = strtoupper($request->observacion);

        $aduanas = Aduana::create([
            'descripcion' => $nombre,
            'observacion' => $observacion,
            'estado' => 1
        ]);
        
        // return response()->json($request);
    }

    public function update(Request $request)
    {
        $idAduana = $request->idAduana;
        $nombre = strtoupper($request->aduanaE);
        $observacion = strtoupper($request->observacionE);

        $aduanas = Aduana::where('id',$idAduana)
                        ->first()
                    ->update([
                        'descripcion' => $nombre,
                        'observacion' => $observacion
                    ]);

        // return response()->json($request);
    }

    public function selectAduana(Request $request)
    {
        $aduanas = DB::table('aduanas')
                        ->select('id',
                                'descripcion'
                                )
                        ->where('estado',1)
                        ->orderBy('descripcion','asc')
                        ->get();

        // return response()->json($aduanas);
        return ['aduana' => $aduanas];
    }
}
