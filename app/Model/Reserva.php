<?php

namespace App\Model;

use DB;
use App\Model\BaseModel;

class Reserva extends BaseModel
{
    protected $table = 'reserva';
    protected $primaryKey = 'id_reserva';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('reserva_local', 'reserva_local.id_reserva_local', 'reserva.id_reserva_local');
        $query->join('morador', 'morador.id_morador', 'reserva.id_morador');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->select('reserva.*', 'reserva_local.*', 'morador.*', 'apartamento.*');
        $query->whereNull('reserva.dt_fim');
        $query->orderBy('reserva.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        $this->dt_reserva = str_replace('/','-', $this->dt_reserva);
    }

    public function countReservas()
    {
        $reservas = DB::table('reserva')->whereNull('reserva.dt_fim')->count();
        return $reservas;
    }
}
