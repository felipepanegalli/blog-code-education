@extends('template')

@section('title')
    Página de Login
@endsection
@section('content')
    <div class="col-xs-offset-4 col-xs-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Faça o login...</h3>
            </div>
            <div class="panel-body">

                <form method="post" action="/auth/login">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email:</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Lembrar
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Logar</button>
                </form>

            </div>
        </div>
    </div>
@endsection