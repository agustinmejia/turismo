<div class="panel panel-bordered">
    <div class="panel-body">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>N&deg;</th>
                        <th>Prestador de servicios</th>
                        <th align="right">Cantidad de registros</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @forelse ($activities as $item)
                        <tr @if (!count($item->details) && !count($item->details_empties)) style="background-color: rgba(185,0,0,0.2)" @endif>
                            <td>{{ $cont }}</td>
                            <td>
                                <span data-info='@json($item)' data-toggle="modal" data-target="#info-modal" class="label-data">
                                    {{ $item->name }} <br> <small>{{ $item->type ? $item->type->name : '' }} {{ $item->category ? $item->category->name : '' }}</small>
                                </span>
                            </td>
                            <td align="right">
                                @if (!count($item->details_empties))
                                    {{ count($item->details) }}
                                @else
                                    Sin movimiento
                                @endif
                            </td>
                        </tr>
                        @php
                            $cont++;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="3"><h4 class="text-center">No hay resultados</h4></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .label-data{
        cursor: pointer;
    }
</style>
<script>
    $(document).ready(function(){
        $('.label-data').click(function(){
            let data = $(this).data('info');
            $('#label-name').html(`${data.name} <br> <small>${data.type ? data.type.name : ''} ${data.category ? data.category.name : ''}</small>`);
            $('#label-city').html(`${data.city.name} - ${data.city.province.state.name}`);
            $('#label-phone').text(data.phone);
            $('#label-email').text(data.email ? data.email : 'No definido');
            $('#label-owner').text(data.owner);
            $('#label-address').text(data.address);
        });
    });
</script>