@extends('voyager::master')

@section('content')
    <div class="page-content browse container-fluid">
        @if (Auth::user()->role_id == 2)
        @include('voyager::alerts')
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            @php
                                $hotels = \App\Models\Hotel::with(['type', 'category', 'group', 'city'])
                                            ->where('user_id', Auth::user()->id)->where('deleted_at', NULL)->get();
                            @endphp
                            @if (count($hotels) == 0 && Auth::user()->role_id == 2)
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h1>Bienvenido al Sistema de Administración de Turismo</h1>
                                        <button data-toggle="modal" data-target="#add_hotel-modal" class="btn btn-success btn-lg"><i class="voyager-company"></i> Registrar Hotel</button>
                                    </div>
                                </div>
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Bienvenido, {{ Auth::user()->name }}!</h2>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button data-toggle="modal" data-target="#add_hotel-modal" class="btn btn-success"><i class="voyager-company"></i> Registrar Hotel</button>
                                </div>
                                <div class="col-md-12">
                                    <table id="dataTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>n&deg;</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Categoría</th>
                                                <th>Ciudad</th>
                                                <th>Dirección</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $cont = 1;
                                            @endphp
                                            @foreach ($hotels as $item)
                                                <tr>
                                                    <th>{{ $cont }}</th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->type->name }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>{{ $item->city->name }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    @php
                                                        switch ($item->status) {
                                                            case 'habilitado':
                                                                $type = 'success';
                                                                break;
                                                            case 'inhabilitado':
                                                                $type = 'danger';
                                                                break;
                                                            case 'pendiente':
                                                                $type = 'warning';
                                                                break;
                                                            default:
                                                                $type = 'default';
                                                                break;
                                                        }
                                                    @endphp
                                                    <td><label class="label label-{{ $type }}">{{ $item->status }}</label></td>
                                                    <td class="no-sort no-click bread-actions text-right">
                                                        <a href="{{ route('hotels.register.datail', ['name' => $item->slug]) }}" data-id="{{ $item->id }}" title="Agregar registro" class="btn btn-sm btn-dark btn-add-register">
                                                            <i class="voyager-logbook"></i> <span class="hidden-xs hidden-sm">Administrar</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $cont++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Add hotel modal --}}
    <form action="{{ route('hoteles.store') }}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="voyager.dashboard">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="modal modal-success fade" tabindex="-1" id="add_hotel-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-company"></i> Registrar hotel</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="hotels_type_id">Tipo de hotel</label>
                                <select name="hotels_type_id" id="select-hotels_type_id" class="form-control select2" required>
                                    <option value="" disabled selected>Selecciona el tipo de hotel</option>
                                    @foreach (\App\Models\HotelsType::with('categories')->where('deleted_at', NULL)->get() as $item)
                                        <option value="{{ $item->id }}" data-categories="{{ $item->categories }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="hotels_category_id">Categoría de hotel</label>
                                <select name="hotels_category_id" id="select-hotels_category_id" class="form-control" required>
                                    <option value="" disabled selected>Ninguna</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="hotels_group_id">Cadena de hoteles a la que pertenece</label>
                                <select name="hotels_group_id" class="form-control select2">
                                    <option value="">Ninguna</option>
                                    @foreach (\App\Models\HotelsGroup::where('deleted_at', NULL)->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="city_id">Ciudad</label>
                                <select name="city_id" class="form-control select2" required>
                                    <option value="" disabled selected>Selecciona el tipo de hotel</option>
                                    @foreach (\App\Models\City::where('deleted_at', NULL)->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" placeholder="Las Palmas" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Telefono(s)/Celular(es)</label>
                                <input type="text" name="phone" class="form-control" placeholder="4628978 - 75199157" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fax">Fax</label>
                                <input type="text" name="fax" class="form-control" placeholder="902955354">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="mail@example.com" required>
                            </div>
                            <div class="col-md-12">
                                <label for="address">Dirección</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="C/ 6 de Agostos Esq. Santa Cruz Nro 1000" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Sí, registrar">
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Add hotel modal --}}
    {{-- <form id="form-add-register" action="{{ route('hotels.store.register') }}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="voyager.dashboard">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="id">
        <div class="modal modal-primary fade" tabindex="-1" id="add_hotel_register-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-list"></i> Registrar actividades del día</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="date">Fecha</label>
                                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="entry">Ingresos</label>
                                <input type="number" step="1" min="0" name="entry" class="form-control" value="0" required>
                            </div>
                            <div class="col-md-6">
                                <label for="stay_night">Pernoctaciones</label>
                                <input type="number" step="1" min="0" name="stay_night" class="form-control" value="0" required>
                            </div>
                            <div class="col-md-12">
                                <label for="observations">Observaciones</label>
                                <textarea name="observations" class="form-control" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-dark" value="Sí, registrar">
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
@stop

@section('javascript')
    <script>
        $(document).ready(function(){
            $('.btn-add-register').click(function(){
                let id = $(this).data('id');
                $('#form-add-register input[name="id"]').val(id);
            });

            $('#select-hotels_type_id').change(function(){
                let categories = $('#select-hotels_type_id option:selected').data('categories');
                let categories_list = '';
                if(categories.length){
                    categories.map(category => {
                        categories_list += `<option value="${category.id}">${category.name}</option>`;
                    });
                }else{
                    categories_list += `<option value="">Ninguna</option>`;
                }
                $('#select-hotels_category_id').html(categories_list);
            });
        });
    </script>
@stop
