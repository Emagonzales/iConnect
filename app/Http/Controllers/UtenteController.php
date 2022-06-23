<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;   
use App\Helpers\APIHelpers;

class UtenteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utente= User::all();
        $response = APIHelpers::createAPIResponse(false, 200,'', $utente);
        return response()->json($response, 200);
        
        //return view('profile', compact('response'));
        //return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idUtente
     * @return \Illuminate\Http\Response
     */
    public function show($idUtente)
    {
        
        $response= [];
        $utente= User::find($idUtente);
        
        if($utente){
            $response = APIHelpers::createAPIResponse(false, 200,'', $utente);
            return //response()
                //->json($response, 200)
                view('profile')->with('response', $utente);
        } else
            return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $utente = User::find($id);
        $utente-> telefono = $request->input('telefono');
        $utente_aggiornato = $utente-> save();

        if($utente_aggiornato){
            $response = APIHelpers::createAPIResponse(false, 200, 'Aggiornamento del dato con successo', null);
            return view('profile')->with('response', $utente);
        }else{
            $response = APIHelpers::createAPIResponse(true, 400, 'Errore aggiornamento', null);
            return response()->json($response, 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utente = User::find($id);
        $utente_eliminato = $utente-> delete();

        if($utente_eliminato){
            //$response = APIHelpers::createAPIResponse(false, 200, 'Eliminato', null);
            return view('auth/login');
        }else{
            $response = APIHelpers::createAPIResponse(true, 400, 'Errore', null);
            return response()->json($response, 400);
        }
    }
}
