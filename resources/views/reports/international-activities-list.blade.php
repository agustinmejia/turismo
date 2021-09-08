<div class="panel panel-bordered">
    <div class="panel-body">
        <div class="col-md-12">
            <p>NÚMERO DE LLEGADAS (I)  y  PERNOCTACIONES (P),  SEGÚN PAÍS DE RESIDENCIA DEL VIAJERO</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Departamentos</th>
                        @foreach ($countries as $item)
                        <th colspan="2">{{ $item->name }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Días</th>
                        @foreach ($countries as $item)
                        <th>I</th>
                        <th>P</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cantidad_dias = date('t', strtotime($date.'-1'));
                    @endphp
                    @for ($index = 1; $index <= $cantidad_dias; $index++)
                        <tr>
                            <td>{{ $index }}</td>
                            @foreach ($countries as $country)
                                @php
                                    // Registroas del día actual
                                    $register_days = $country->detail->where('start', date('Y-m-d', strtotime($date.'-'.$index)));
                                    // Registroas del día previo
                                    $register_days_prev = $country->detail->where('start', date('Y-m-d', strtotime($date.'-'.$index.' -1 days')));
                                    $start = $register_days->count();
                                    $pernoctation = 0;
                                    // Recorrer los registros del día actual
                                    foreach ($register_days as $reg) {
                                        // Recorrer los registros del día previo
                                        foreach ($register_days_prev as $reg_prev) {
                                            // Si la CI se encuentra registrada en el día previo entonces es una pernoctación
                                            if($reg->ci == $reg_prev->ci){
                                                $pernoctation++;
                                            }
                                        }
                                    }
                                @endphp
                                <td>{{ $start - $pernoctation }}</td>
                                <td>{{ $pernoctation }}</td>
                            @endforeach
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    th{
        font-size: 10px
    }
</style>
<script>
    $(document).ready(function(){

    });
</script>