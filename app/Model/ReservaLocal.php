<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReservaLocal extends Model
{
    protected $table = 'reserva_local';
    protected $primaryKey = 'id_reserva_local';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->whereNull('reserva_local.dt_fim');
        $query->select('reserva_local.*');
        $query->orderBy('reserva_local.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        $this->vl_reserva_local = str_replace(',','.', $this->vl_reserva_local);
    }
}
