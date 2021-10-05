<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// Models
use App\Models\HotelsDetail;

class HotelsDetailsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reg = HotelsDetail::with(['country', 'hotel'])->where('deleted_at', NULL)
                // ->select('phone  as Telefono', 'fax as Fax', 'email as Email', 'owner as Propietario', 'status as Estado')
                ->get();
        $collect = collect();
        foreach ($reg as $item) {
            $collect->push([
                'id' => $item->id,
                'hotel' => $item->hotel ? $item->hotel->name : '',
                'nombre' => $item->full_name,
                'procedencia' => $item->country ? $item->country->name : '',
                'ci' => $item->ci,
                'nro_pieza' => $item->room_number,
                'edad' => $item->age,
                'genero' => $item->gender,
                'estado_civil' => $item->marital_status,
                'ocupacion' => $item->job,
                'entrada' => $item->start,
                'salida' => $item->finish,
                'motivo' => $item->reason,
            ]);
        }
        return $collect;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Hotel',
            'Nombre completo',
            'Procedencia',
            'CI/Pasaporte',
            'Número de pieza',
            'Edad',
            'Género',
            'Estado civíl',
            'Ocupación',
            'Entrada',
            'Salida',
            'Motivo',
        ];
    }
}
