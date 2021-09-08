@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Añadir huesped')

@section('page_header')
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="voyager-logbook"></i>
                Actividades
            </h1>
        </div>
        <div class="col-md-6 text-right" style="margin-top: 30px">
            {{-- @if (!count($hotel->details)) --}}
            <button data-toggle="modal" data-target="#store_empty-modal" class="btn btn-dark"><i class="voyager-code"></i> Día sin movimiento</button>
            {{-- @endif --}}
            <button data-toggle="modal" data-target="#add_activity-modal" class="btn btn-success"><i class="voyager-plus"></i> Añadir</button>
            <button data-toggle="modal" data-target="#generate_report-modal" class="btn btn-danger"><i class="voyager-documentation"></i> Generar informe</button>
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
    <form action="{{ route('hotels.register.detail.store', ['hotel' => $id]) }}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="hotels.activities">
        <div class="modal modal-success fade" id="add_activity-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-company"></i> Registrar huesped</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            @include('partials.form-register-activity', ['type' => 'add'])
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

    {{-- Add modal --}}
    <form action="{{ route('hotels.register.detail.update', ['hotel' => $id]) }}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="hotels.activities">
        <div class="modal modal-info fade" id="update_activity-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-edit"></i> Editar huesped</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <input type="hidden" name="id">
                            @include('partials.form-register-activity', ['type' => 'edit'])
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-info" value="Sí, registrar">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('hotels.activities.pdf', ['hotel' => $id]) }}" method="POST" target="_blank">
        <div class="modal modal-danger fade" tabindex="-1" id="generate_report-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-trash"></i> Desea eliminar el siguiente registro?</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger" value="Sí, generar">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('hotels.register.detail.empty.store', ['hotel' => $id]) }}" method="POST">
        <div class="modal modal-primary fade" tabindex="-1" id="store_empty-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-code"></i> Guardar día sin movimiento</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="redirect" value="hotels.activities">
                        @csrf
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="observations">Observaciones</label>
                            <textarea name="observations" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-dark" value="Sí, guardar">
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Desea eliminar el siguiente registro?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        <input type="hidden" name="hotel_id" value="{{ $id }}" >
                        <input type="hidden" name="redirect" value="hotels.activities">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sí, eliminar">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
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
                { data: 'actions', title: 'Acciones', orderable: false, searchable: false },
            ]
            let id = "{{ $id }}";
            customDataTable("{{ url('admin/hoteles/register/detail/list') }}/"+id, columns);
        });

        function edit(data){
            // console.log(data)
            $('#update_activity-modal input[name="id"]').val(data.id);
            $('#update_activity-modal input[name="full_name"]').val(data.full_name);
            $('#update_activity-modal input[name="ci"]').val(data.ci);
            $('#update_activity-modal input[name="room_number"]').val(data.room_number);
            $('#update_activity-modal input[name="age"]').val(data.age);
            $('#update_activity-modal select[name="gender"]').val(data.gender);
            $('#update_activity-modal select[name="marital_status"]').val(data.marital_status);
            $('#update_activity-modal input[name="job"]').val(data.job);
            $('#update_activity-modal input[name="start"]').val(data.start);
            if (data.finish) {
                $('#update_activity-modal input[name="finish"]').val(data.finish);
            }

            $('#select-reason-edit').val(data.reason).trigger('change');
            $('#select-country_id-edit').val(data.country_id).trigger('change');
            // Si es Boliviano set Departamento, Provincia y Ciudad
            if(data.country_id == 1){
                $('#select-state_id-edit').val(data.nacionality.state_id).trigger('change');
                $('#select-province_id-edit').val(data.nacionality.province_id).trigger('change');
                $('#select-city_id-edit').val(data.nacionality.city_id).trigger('change');
            }else{
                $('#update_activity-modal input[name="origin"]').val(data.nacionality.origin);
            }            
        }

        function inicializar_select2(id){
            $(`#select-${id}`).select2({
                tags: true,
                createTag: function (params) {
                    return {
                    id: params.term,
                    text: params.term,
                    newOption: true
                    }
                },
                templateResult: function (data) {
                    var $result = $("<span></span>");
                    $result.text(data.text);
                    if (data.newOption) {
                        $result.append(" <em>(ENTER para agregar)</em>");
                    }
                    return $result;
                },
            });
        }

        function deleteItem(url){
            $('#delete_form').attr('action', url);
        }
    </script>
@stop
