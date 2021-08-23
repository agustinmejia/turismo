@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Añadir certificado')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-certificate"></i>
        Añadir certificado
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form action="{{ route('hotels.certificate.store', ['hotel' => $id]) }}" method="POST">
                @csrf
                <input type="hidden" name="redirect" value="voyager.hotels.index">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="hotels_documents_type_id">Tipo</label>
                                    <select name="hotels_documents_type_id" class="form-control select2" required>
                                        <option value="">-- Tipo de documento --</option>
                                        @foreach (\App\Models\HotelsDocumentsType::where('deleted_at', NULL)->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="code">Número de documento</label>
                                    <input type="text" name="code" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="start">Fecha de inicio</label>
                                    <input type="date" name="start" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="expiration">Fecha de expiración</label>
                                    <input type="date" name="expiration" class="form-control" required>
                                </div>
                                {{-- <div class="col-md-6">
                                    <label for="file">Archivo</label>
                                    <input type="file" name="file" class="form-control" accept="application/pdf">
                                </div> --}}
                                <div class="col-md-12">
                                    <label for="observations">Observaciones</label>
                                    <textarea name="observations" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary">Guardar <i class="voyager-check"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function(){

        });
    </script>
@stop
