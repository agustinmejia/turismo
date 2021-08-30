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
    <form action="{{ route('hotels.register.detail.store', ['id' => $id]) }}" method="POST">
        @csrf
        <input type="hidden" name="redirect" value="">
        <div class="modal modal-success fade" tabindex="-1" id="add-modal" role="dialog">
            <div class="modal-dialog">
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
            customDataTable("{{ url('admin/hoteles/register/detail/list') }}/"+id, columns);
        });

        function deleteItem(id){
            let url = '{{ url("admin/ventas") }}/'+id;
            $('#delete_form').attr('action', url);
        }

    </script>
@stop
