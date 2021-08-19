@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Añadir Hotel')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-company"></i>
        Añadir Hotel
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form action="{{ route('hoteles.store') }}" method="POST">
                @csrf
                <input type="hidden" name="redirect" value="voyager.hotels.index">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
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
                                <div class="col-md-12">
                                    <label for="social">Redes sociales</label>
                                    <textarea name="social" class="form-control" rows="3">http://facebook.com/</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="owner">Propietario</label>
                                    <input type="text" name="owner" class="form-control" required>
                                    {{-- <select name="user_id" class="form-control select2">
                                        <option value="">No definido</option>
                                        @foreach (\App\Models\User::where('deleted_at', NULL)->get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select> --}}
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
