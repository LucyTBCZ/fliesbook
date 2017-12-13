@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Amis</div>

                <div class="panel-body">
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-auto control-label" for="user_name">Nom d'insect</label>
                            <input type="text" class="form-control" name="user_name" id="user_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter l'ami</button>
                    </form>

                    <ul>
                        @forelse($friends as $friend)
                            <form method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="user_id" value="{{ $friend->user->id }}">
                                <li>{{ $friend->user->name }} | <button type="submit" class="btn btn-danger">Supprimer</button></li>
                            </form>
                        @empty
                            <li>Vous n'avez aucun ami</li>
                        @endforelse
                    </ul>
                    <a href="{{route('profil.index')}}">Retour au profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
