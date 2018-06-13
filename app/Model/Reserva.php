<?php

namespace App\Model;

use DB;
use Carbon\Carbon;
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

    public function datasQueSeraoBloqueadas($idReservLocal)
    {
        return $this
            ->newQuery()
            ->where('id_reserva_local', $idReservLocal)
            ->whereNull('dt_fim')
            ->get();
    }

    public function save(array $options = [])
    {
        //Se a reserva excluída não tiver id verificar se tem reserva com a mesma data
        if (!$this->id_reserva_local) {
            $dtFormulario = Carbon::parse($this->dt_reserva);
            $idReservaLocal = $this->id_reserva_local;

            $existente = $this->verificaSeExisteReservaNaMesmaData($idReservaLocal, $dtFormulario);

            if ($existente) {
                throw new \Exception('Já existe uma reserva nesta data');
            }
        }

        return parent::save($options);
    }

    public function verificaSeExisteReservaNaMesmaData($idReservaLocal, $dataReserva)
    {
        return $this->newQuery()
            ->where('id_reserva_local', $idReservaLocal)
            ->where('dt_reserva', $dataReserva)
            ->whereNull('dt_fim')
            ->first();
    }

    public function findReserva($idReserva) 
    {
        return $this->newQuery()
            ->where('reserva.id_reserva', $idReserva)
            ->join('morador', 'morador.id_morador', 'reserva.id_morador')
            ->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento')
            ->whereNull('reserva.dt_fim')
            ->first();
    }
}
