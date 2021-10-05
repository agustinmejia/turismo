<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// Models
use App\Models\Hotel;

class HotelsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reg = Hotel::with(['type', 'category', 'city.province.state', 'group'])->where('deleted_at', NULL)
                // ->select('phone  as Telefono', 'fax as Fax', 'email as Email', 'owner as Propietario', 'status as Estado')
                ->get();
        $collect = collect();
        foreach ($reg as $item) {
            $collect->push([
                'id' => $item->id,
                'nombre' => $item->name,
                'tipo' => $item->type ? $item->type->name : '',
                'categoria' => $item->category ? $item->category->name : '',
                'ciudad' => $item->city ? $item->city->name.' - '.$item->city->province->name.' - '.$item->city->province->state->name : '',
                'cadena_hotelera' => $item->hotels_group_id,
                'grupo' => $item->group ? $item->group->name : '',
                'direccion' => $item->address,
                'telefono' => $item->phone,
                'fax' => $item->fax,
                'email' => $item->email,
                'propietario' => $item->owner,
                'estado' => $item->status,
            ]);
        }
        return $collect;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nombre',
            'Tipo',
            'Categoría',
            'Ciudad',
            'Cadena hotelera',
            'Grupo',
            'Dirección',
            'Teléfono',
            'Fax',
            'Email',
            'Propietario',
            'Estado',
        ];
    }
}
