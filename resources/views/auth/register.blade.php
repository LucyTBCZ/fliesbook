@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <div class="panel panel-default">
                <h1 class="insect">Register an insect</h1>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-auto control-label">Name of the insect</label>

                            <div class="col-md-auto">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-auto control-label">E-Mail of the insect</label>

                            <div class="col-md-auto">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('race') ? ' has-error' : '' }}">
                            <label for="race" class="col-md-auto control-label">Race of the insect</label>

                            <div class="col-md-auto">
                                <input id="race" type="text" class="form-control" name="race" value="{{ old('race') }}" required autofocus>
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
                            <label for="family" class="col-md-auto control-label">Family of the insect</label>

                            <div class="col-md-auto">
                                <input id="family" type="text" class="form-control" name="family" value="{{ old('race') }}" required autofocus>
                            </div>
                        </div>   

                        <div class="form-group{{ $errors->has('food') ? ' has-error' : '' }}">
                            <label for="food" class="col-md-auto control-label">Food of the insect</label>

                            <div class="col-md-auto">
                                <input id="food" type="text" class="form-control" name="food" value="{{ old('race') }}" required autofocus>
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-auto control-label">Age of the insect</label>

                            <div class="col-md-auto">
                                <input id="age" type="number" class="form-control" name="age" value="{{ old('race') }}" required autofocus>
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-auto control-label">Password</label>

                            <div class="col-md-auto">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-auto">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-primary">
                                    Register the insect!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
