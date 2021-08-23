@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Añadir huesped')

@section('page_header')
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-title">
                <i class="voyager-list"></i>
                Actividades
            </h1>
        </div>
        <div class="col-md-6 text-right" style="margin-top: 30px">
            <button data-toggle="modal" data-target="#add-activity-modal" class="btn btn-success"><i class="voyager-plus"></i> Añadir</button>
            <button data-toggle="modal" data-target="#generate_report-modal" class="btn btn-danger"><i class="voyager-list"></i> Generar informe</button>
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
    <form action="{{ route('hotels.register.detail.store', ['id' => $id]) }}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="hotels.activities">
        <div class="modal modal-success fade" id="add-activity-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-company"></i> Registrar huesped</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            @include('partials.form-register-activity')
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
            let id = "{{ $id }}";
            customDataTable("{{ url('admin/hoteles/register/detail/list') }}/"+id, columns);
        });
    </script>
@stop
