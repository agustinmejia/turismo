@extends('voyager::auth.master')

@section('content')
    <div class="login-container" style="margin-top: -200px !important">

        <p>Regístrate aquí:</p>

        <form action="{{ route('register.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group form-group-default" id="nameGroup">
                <label>Tu nombre</label>
                <div class="controls">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="John Doe" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="phoneGroup">
                <label>Tu N&deg; de celular</label>
                <div class="controls">
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="75199157" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="emailGroup">
                <label>{{ __('voyager::generic.email') }}</label>
                <div class="controls">
                    <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="mail@example.com" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>{{ __('voyager::generic.password') }}</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group" id="confirmMeGroup">
                <div class="controls">
                    <input type="checkbox" name="confirm" id="confirm" value="1" required><label for="confirm" class="remember-me-text">Acepto los <a href="#">terminos y condiciones de uso</a></label>
                </div>
            </div>

            <button type="submit" class="btn btn-block login-button">
                <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                <span class="signin">{{ __('voyager::generic.login') }}</span>
            </button>

            <div class="col-md-12 text-right">
                <a href="{{ route('login') }}" class="btn btn-link">Ya tengo cuenta</a>
            </div>

        </form>

        <div style="clear:both"></div>

        @if(!$errors->isEmpty())
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div> <!-- .login-container -->
@endsection

@section('post_js')
    <script>
        
    </script>
@endsection
