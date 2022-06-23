@extends('layouts.app')

@section('content')
@php
     use App\Http\Controllers\IndividualChatController;
@endphp

<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm">
            <div class="card">
                <div class="card-header"><center>Messaggi</center></div>

                <div class="card-body">
                    <a href="{{ url()->previous()}}"  class="btn btn-secondary">Torna dietro</a> <br><br>
                    <div class="container">
                        <div class="row">
                          <div class="col">
                                QUI CI VANNO I MESSAGGI
                            <hr>
                            <form action="">
                                <label for="exampleFormControlTextarea1">Inserisci messaggio</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">INVIA</button>
                            </form>
                          </div>
                          <div class="col-3 ">
                            <div class="card">
                                <div class="card-header">
                                  Chat
                                </div>
                                <ul class="list-group list-group-flush">
                                    @php
                                        $idUtente=Auth::user()->id;
                                        $chats=(new IndividualChatController)->show($idUtente);
                                    @endphp

                                    @foreach ($chats as $chat)
                                        @php
                                          $query=DB::table('Users')
                                                ->select('nome','cognome')
                                                ->where('id',$chat->Utente2) 
                                                ->get() 
                                        @endphp
                                        <li class="list-group-item">
                                            @foreach ($query as $user)
                                                {{$user->nome}} {{$user->cognome}}
                                            @endforeach
                                        </li>
                                    @endforeach
                                  
                                </ul>
                              </div>
                          </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection