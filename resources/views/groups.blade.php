@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm">
            <div class="card">
                @php
                    use Illuminate\Support\Facades\URL;
                @endphp
                <div class="card-header">
                    <center>Gruppi di cui fai parte </center>
                </div>
                <div class="card-body">
                    <a href="{{ url()->previous()}}"  class="btn btn-secondary">Torna dietro</a><br><br>

                    <div class="gruppo">
                        <center>
                            @foreach ($user as $u)
                                @foreach($groups as $g)
                                    <a href="{{ route('group', ['codU' => $g, 'id'=> $u]) }}" class="btn btn-warning">{{ $g->nome }}</a><br><br>
                                @endforeach
                            @endforeach
                        </center>             
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection