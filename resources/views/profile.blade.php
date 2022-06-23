@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm">
            <div class="card">
                <div class="card-header"><center>PROFILO</center></div>
                <div class="card-body">
                    <a href="{{ url()->previous()}}"  class="btn btn-secondary">Torna dietro</a><br><br>

                    <div class="profilo">
                        <h4>Nome:</h4>{{$response->nome}}<br>
                        <h4>Cognome:</h4> {{$response->cognome}} <br>
                        <h4>Email:</h4>{{$response->email}} <br>
                        <h4>Telefono:</h4> 
                                    @if($response->telefono)
                                        {{$response->telefono}} <br>
                                    @else
                                    <form class="form-inline" method="POST" action="{{route('user.update', [$response->id])}}">
                                       @method('PATCH')
                                        <div class="form-group mx-sm-3 mb-2">
                                          <label for="telefono" class="sr-only">Telefono</label>
                                          <input class="form-control" id="telefono" name="telefono" placeholder="telefono">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Modifica</button>
                                      </form>
                                    @endif  

                        @php
                            use App\User;
                        @endphp

                        @if($response->ruolo=='D')

                            @php
                                $professor=User::find($response->id)->professor()->get();     
                            @endphp

                            @foreach ($professor as $data)
                                <h4>Corso Insegnamento:</h4> {{$data->corsoI}} <br>
                                <h4>Dipartimento:</h4> {{$data->Dipartimento}} <br>
                            @endforeach
                            
                        @elseif($response->ruolo=='P')

                            @php
                                $staff=User::find($response->id)->staff()->get();     
                            @endphp

                            @foreach ($staff as $data)
                                <h4>Dipartimento:</h4> {{$data->Dipartimento}} <br>
                            @endforeach

                        @else
                            @php
                                $student=User::find($response->id)->student()->get();     
                            @endphp

                            @foreach ($student as $data)
                                <h4>Matricola:</h4> {{$data->matricola}} <br>
                                <h4>Anno Iscrizione:</h4> {{$data->AnnoI}} <br>
                                <h4>Corso di Laurea:</h4> {{$data->corsoL}} <br>
                                <h4>Anno Corso di Laurea:</h4> {{$data->AnnoCdL}} <br>
                                <h4>Dipartimento:</h4> {{$data->Dipartimento}} <br>
                            @endforeach
                        @endif
                        <h4>Punteggio:</h4>{{$response->punteggio}} <br>

                    </div>
                    <br><br>
                    <center>
                        <form method='POST' action="{{route('user.delete', $response->id)}}">
                        @method('DELETE')
                            <button type="submit" on class="btn btn-danger">elimina profilo</button>
                        </form>
                    </center>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
