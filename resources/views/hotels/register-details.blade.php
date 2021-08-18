@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Regitro de hospedaje')

@section('page_header')
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="voyager-edit"></i>
                Regitro de hospedajes | {{ $hotel->type->name }} {{ $hotel->name }}
            </h1>
        </div>
        <div class="col-md-6 text-right" style="margin-top: 30px">
            <button type="button" data-toggle="modal" data-target="#add-modal" class="btn btn-success"><i class="voyager-plus"></i> Añadir</button>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add modal --}}
    <form action="{{ route('hotels.register.datail.store', ['name' => $slug]) }}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="hotels.register.datail">
        <div class="modal modal-success fade" tabindex="-1" id="add-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-company"></i> Registrar huesped</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="full_name">Nombre completo</label>
                                    <input type="text" name="full_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="ci">CI/Pasaporte</label>
                                    <input type="text" name="ci" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="reason">Motivo de viaje</label>
                                    <select name="reason" class="form-control" required>
                                        <option value="Paseo">Paseo</option>
                                        <option value="Trabajo">Trabajo</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="room_number">N&deg; de pieza</label>
                                    <input type="number" name="room_number" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="country_id">País de procedencia</label>
                                    <select name="country_id" class="form-control select2">
                                    @foreach (\App\Models\Country::where('deleted_at', NULL)->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="age">Edad</label>
                                    <input type="number" name="age" step="1" min="0" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender">Género</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="" selected disabled>-- Selecciona el género --</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="N">No especifíca</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="marital_status">Estado civil</label>
                                    <select name="marital_status" class="form-control" required>
                                        <option value="" selected disabled>-- Selecciona el estado civil --</option>
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Visudo(a)">Viudo(a)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="job">Profesión/Ocupación</label>
                                    <input type="text" name="job" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="start">Fecha de ingreso</label>
                                    <input type="date" name="start" class="form-control" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="finish">Fecha de salida</label>
                                    <input type="date" name="finish" class="form-control">
                                </div>
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
@stop

@section('javascript')
    <script src="{{ url('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let columns = [
                { data: 'id', title: 'id' },
                { data: 'full_name', title: 'Huesped' },
                { data: 'country', title: 'País de procedencia' },
                { data: 'reason', title: 'Motivo' },
                { data: 'room_number', title: 'Nro de pieza' },
                { data: 'age', title: 'Edad' },
                // { data: 'marital_status', title: 'Estado civil' },
                // { data: 'job', title: 'Profesión/Ocupación' },
                { data: 'start', title: 'Ingreso' },
                { data: 'finish', title: 'Salida' },
                // { data: 'action', title: 'Acciones', orderable: false, searchable: false },
            ]
            let id = "{{ $hotel->id }}";
            customDataTable("{{ url('admin/hotels/register/detail/list') }}/"+id, columns);
        });

        function deleteItem(id){
            let url = '{{ url("admin/ventas") }}/'+id;
            $('#delete_form').attr('action', url);
        }

    </script>
@stop