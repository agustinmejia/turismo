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