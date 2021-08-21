<table width="100%" style="margin-bottom: 20px">
    <tr>
        <td width="200px"><img src="{{ asset('images/gadbeni.png') }}" width="200px" alt="GADBENI"></td>
        <td>
            <table width="100%">
                <tr>
                    <td width="180px"><b>ESTABLECIMIENTO</b></td>
                    <td><b>:</b></td>
                    <td>{{ $hotel->name }}</td>
                </tr>
                <tr>
                    <td><b>DIRECCIÓN</b></td>
                    <td><b>:</b></td>
                    <td>{{ $hotel->address }}</td>
                </tr>
                <tr>
                    <td><b>TELEFONO</b></td>
                    <td><b>:</b></td>
                    <td>{{ $hotel->phone }}</td>
                </tr>
            </table>
        </td>
        <td width="150px"><img src="{{ asset('images/beni_turistico.png') }}" width="150px" alt="beni_turistico"></td>
        <td width="150px"><img src="{{ asset('images/bolivia_sur.png') }}" width="150px" alt="bolivia_sur"></td>
    </tr>
</table>

<table width="100%" style="margin-bottom: 20px">
    <tr>
        <td>PARTE DE MOVIMIENTO DIARIO</td>
    </tr>
    <tr>
        <td>Para conocimiento de las Autoridades del Departamento se distribuyen el siguiente parte diario</td>
    </tr>
    <tr>
        <td>Correspondiente a la fecha {{ date('d-m-Y', strtotime($date)) }}</td>
    </tr>
</table>

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

<table width="100%" style="margin-top: 20px">
    <tr>
        <td>
            Trinidad, {{ date('d') }} de {{ date('m') }} de {{ date('Y') }} <br>
            Me responsabilizo de la veracidad del presente parte
        </td>
    </tr>
    <tr>
        <td style="text-align: center; padding-top: 50px">
            .................................................. <br>
            Propietario o administrador
        </td>
    </tr>
</table>