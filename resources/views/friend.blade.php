@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Ajouter un ami</h1>
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-auto control-label" for="user_name">Nom d'insect</label>
                            <input type="text" class="form-control" name="user_name" id="user_name">
                        </div>
                        <input type="submit" class="btn btn-primary" name="add_friend" value="Ajouter l'ami"/>
                    </form>

                    <h1>Demande d'ami en attente</h1>
                    <ul>
                        @forelse($friendspending as $friend)
                            <form method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ $friend->friend->id }}">
                                <li>{{ $friend->friend->name }} | 
                                <input type="submit" class="btn btn-primary" name="accept_friend" value="Accepter"/>
                                <input type="submit" class="btn btn-danger" name="refuse_friend" value="Refuser"/></li>
                            </form>
                        @empty
                            <li>Vous n'avez aucune demande d'ami en attente</li>
                        @endforelse
                    </ul>

                    <h1>Vos amis</h1>
                    <ul>
                        @forelse($friendsaccepted as $friend)
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
