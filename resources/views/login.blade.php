@extends('layouts.template')
@section('title','Login')
@section('content')
    <div id="login-row" class="row justify-content-center align-items-center" >
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                <form id="login-form" class="form" action="{{route('utilizador.login')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="email" class="text">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="text">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-md">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection