@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mes informations</div>
                <a href="{{ route('profile.friends') }}">Afficher la liste d'amis</a>

                <div class="panel-body">
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-auto control-label" for="race">Race</label>
                            <select name="race" id="race" class="form-control">
                                    
                                    @foreach($specimens as $specimen)
                                    <option {{ Auth::User()->race == $specimen->espece ? 'selected' : '' }}>{{ $specimen->espece }}</option> 
                                    
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-auto control-label" for="family">Famille</label>
                            <input type="text" class="form-control" name="family" id="family" value="{{ Auth::User()->family }}">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-auto control-label" for="food">Nourriture</label>
                                <select name="food" id="food" class="form-control">
                                    
                                    @foreach($options as $option)
                                    <option {{ Auth::User()->food == $option->type ? 'selected' : '' }}>{{ $option->type }}</option> 
                                    
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-auto control-label" for="age">Age</label>
                                <input type="number" class="form-control" name="age" id="age" value="{{ Auth::User()->age }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Editer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
