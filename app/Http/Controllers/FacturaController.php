<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Proveedor;
use App\Archivo;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $search = $request->search;
        $criterion = $request->criterion;

        if ($search=='') {
            $sales = Factura::join('proveedors', 'facturas.cod_pro', '=', 'proveedors.id')
            ->join('archivos', 'facturas.id','=','archivos.name')
            ->select('facturas.id', 'facturas.factura', 'facturas.f_ingreso', 'facturas.orden_compra', 'facturas.migo', 'facturas.carta', 'facturas.status', 'proveedors.nombre','archivos.name')
            ->orderBy('facturas.id', 'desc')->get();
        } else {
             $sales = Factura::join('proveedors', 'facturas.cod_pro', '=', 'proveedors.id')
              ->join('archivos', 'facturas.id','=','archivos.name')
            ->select('facturas.id', 'facturas.factura', 'facturas.f_ingreso', 'facturas.orden_compra', 'facturas.migo', 'facturas.status', 'proveedors.nombre', 'facturas.carta','archivos.name')
            ->where('facturas.'.$criterion, 'like', '%'. $search . '%')->orderBy('facturas.id', 'desc')->get();
        }

        $facs = Archivo::select('archivos.name')->get();

        $long = count($sales);
        for($i=0; $i<$long; $i++){
        // foreach ($purchases as $key ) {

          if ($sales[$i]->status == 1) {
            $sales[$i]->status= 'Verificada';
          }
          elseif ($sales[$i]->status == 2) {
               $sales[$i]->status= 'Recepcion';
          }
           elseif ($sales[$i]->status == 3) {
               $sales[$i]->status= 'Pagada';
          }
      }
      
   dd($long);
        // return [
        //        'pagination' => [
        //         'total'         => $sales->total(),
        //         'current_page'  => $sales->currentPage(),
        //         'per_page'      => $sales->perPage(),
        //         'last_page'     => $sales->lastPage(),
        //         'from'          => $sales->firstItem(),
        //         'to'            => $sales->lastItem(),
        //     ],
        //     'sales' => $sales,'deuda' => $total
        // ];
        return view('facturas.lista',compact('sales','long'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
