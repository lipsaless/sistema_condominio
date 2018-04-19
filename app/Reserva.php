<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';
    protected $primary = 'id_reserva';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('reserva_local', 'reserva_local.id_reserva_local', 'reserva.id_reserva_local');
        $query->whereNull('reserva.dt_fim');
        $query->orderBy('reserva.dt_inicio');

        return $query->get();
    }
}
