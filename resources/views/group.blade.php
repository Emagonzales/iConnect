@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm">
            <div class="card">
                <div class="card-header"><center>Dettagli Gruppo</center></div>
                <div class="card-body">
                  <a href="{{ url()->previous()}}"  class="btn btn-secondary">Torna dietro</a><br><br>

                    <div class="group">
                      Nome: {{$group->nome}} <br>
                      Membri: {{$group->Membri}} <br>
                      Descrizione: {{$group->descrizione}} <br>
                    </div>
                <hr>
                <div class="post"><h1>Post</h1></div>

                @php
                    $id=$group->CodU;
                    use Illuminate\Support\Facades\DB;
                    use App\Http\Controllers\PostController;
                    $posts=(new PostController)->show($id);
                @endphp

                {{--inserimento post--}}
                <hr>
                <p class="text1">inserisci post</p>
                <form class="Post" action="{{route('create.post',['codU' => $id, 'id'=> $user])}}" method="POST">

                  <div class="form-group mx-sm-3 mb-2 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Importanza" id="importanza" value="true">
                    <label class="form-check-label" for="importanza">metti in evidenza</label>
                  </div>
                  <div class="form-group mx-sm-3 mb-2 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Importanza" id="importanza" value="false">
                    <label class="form-check-label" for="importanza">non mettere in evidenza </label>
                  </div>

                  <div class="form-group mx-sm-3 mb-2">
                    <label for="Titolo">Titolo</label>
                    <input class="form-control" id="Titolo" name="Titolo" placeholder="Titolo">
                  </div>
              
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="contenuto">Contenuto</label>
                    <textarea class="form-control" id="contenuto" name="contenuto" rows="3" placeholder="contenuto"></textarea>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary mx-sm-3 mb-2">Inserisci</button>
                </form>

                {{--stampa post--}}
                @foreach($posts as $post)
                  <div class="post">
                    <div class="card">
                      @if($post->importanza=='true')
                        <div class="card-header importante">
                          {{$post->Titolo}}
                        </div>
                      @else
                      <div class="card-header">
                        {{$post->Titolo}}
                      </div>
                      @endif

                    <div class="card-body">
                      <h5 class="card-title">{{$post->Titolo}}</h5>
                      <p class="card-text">{{$post->contenuto}}</p>
                      <small>
                        <cite title="Source Title">
                         @php
                          $query=DB::table('post_user')
                                 ->where('Post','=', $post->idP)
                                 ->value('Utente');

                          $user=DB::table('users')
                                ->select('nome','cognome')
                                ->where('id','=',$query)
                                ->get();

                         @endphp
                          @foreach ($user as $u)
                             - {{$u->nome}} {{$u->cognome}}
                          @endforeach
                        
                            
                        </cite>
                      </small>
                      <br>
                      <button type="submit" class="btn segnala">Segnala</button>
                    </div>
                    </div>
                  </div>
                <br>
                @endforeach
              


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
