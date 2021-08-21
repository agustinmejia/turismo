<table width="100%" cellspacing="0" cellpadding="5" border="1">
    <thead>
        <tr>
            <th>N&deg;</th>
            <th>NOMBRE Y APELLIDOS</th>
            <th>Nº PIEZA</th>
            <th>PROCEDENCIA</th>
            <th>EDAD</th>
            <th>SEXO</th>
            <th>EST. CIVIL</th>
            <th>PROFESIÓN U OCUPACIÓN</th>
            <th>FECHA DE INGRESO</th>
            <th>FECHA DE SALIDA</th>
            <th>MOTIVO DE VIAJE</th>
            <th>CI o PASAPORTE</th>
        </tr>
    </thead>
    <tbody>
        @php
            $cont = 1;
        @endphp
        @foreach ($hotel->details as $detail)
            {{-- {{ dd($detail) }} --}}
            <tr>
                <td>{{ $cont }}</td>
                <td>{{ $detail->full_name }}</td>
                <td>{{ $detail->room_number }}</td>
                <td>{{ $detail->country->name }}</td>
                <td>{{ $detail->age }}</td>
                <td>{{ $detail->gender }}</td>
                <td>{{ $detail->marital_status }}</td>
                <td>{{ $detail->job ?? 'no definido' }}</td>
                <td>{{ date('d-m-Y', strtotime($detail->start)) }}</td>
                <td>{{ $detail->finish }}</td>
                <td>{{ $detail->reason }}</td>
                <td>{{ $detail->ci }}</td>
            </tr>
            @php
                $cont++;
            @endphp
        @endforeach
    </tbody>
</table>