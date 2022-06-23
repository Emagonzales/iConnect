@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm">
            <div class="card">
                <div class="card-header"><center> Benvenuto {{Auth::User()->nome}}</center></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <center>

                        <img src="{{asset('\iConnect.png')}}">
                        <a href="{{route('profile', Auth::User()->id)}}" class="btn btn-primary btn-block ">Profilo</a>
                        <a href="{{route('user.groups', Auth::User()->id)}}" class="btn btn-primary btn-block ">Gruppi</a>
                        <a href="{{route('message')}}" class="btn btn-primary btn-block ">Messaggi</a>
                    
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
