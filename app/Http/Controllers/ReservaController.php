<?php

namespace App\Http\Controllers;

use App\Model\Reserva;
use App\Model\ReservaLocal;
use App\Model\Apartamento;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->model = new Reserva;
    }

    public function principal()
    {
        return view('sistema.reserva.principal');
    }

    public function form()
    {
        $model = new Reserva;
        $modelReservaLocal = new ReservaLocal;

        $obj = $model;

        $locaisDeReserva = $modelReservaLocal->getAll();

        return view('sistema.reserva.form', ['obj' => $obj, 'locaisDeReserva' => $locaisDeReserva]);
    }

    public function grid()
    {
        $model = new Reserva;
        return $model->getAll();
    }

    public function datasBloqueadas() 
    {
        $model = new Reserva;
        $idReservaLocal = $this->request->query('id_reserva_local');

        $reservas = $model->datasQueSeraoBloqueadas($idReservaLocal);

        $datasReservadas = null;

        if(count($reservas) > 1) {

            foreach ($reservas as $key => $info) {
                $dt[$key] = $info->dt_reserva;
            }
            $datasReservadas = implode(',', $dt);
        }

        return response()->json([
            'datas_reservadas' => $datasReservadas
        ]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Reserva;

        if (!empty($params['id_reserva'])) {
            $model = $model->find($params['id_reserva']);
        } else {
            unset($params['id_reserva']);
        }

        $model->fill($params);
        
        $model->limparDados();

        $model->save();
    }

    public function excluir($id)
    {
        $model = new Reserva;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();

        return response([]);
    }
}
