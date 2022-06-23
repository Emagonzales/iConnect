<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Individual_chat;
use App\Message;
use App\Helpers\APIHelpers;


class IndividualChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats= Individual_chat::all();
        $response = APIHelpers::createAPIResponse(false, 200,'', $chats);
        return response()->json($response, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idUtente)
    {
        
        $chat = DB::table('Individual_chats')
                ->where('Utente1', $idUtente)
                ->get();

        if($chat){
            $response = APIHelpers::createAPIResponse(false, 200,'', $chat);
            return $chat;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Individual_chat::find($id);
        $chat_eliminata = $chat-> delete();

        if($chat_eliminata){
            $response = APIHelpers::createAPIResponse(false, 200, 'Eliminata con successo', null);
            return response()->json($response, 200);
        }else{
            $response = APIHelpers::createAPIResponse(true, 400, 'Errore', null);
            return response()->json($response, 400);
        }
    }

//visualizza tutti i messaggi appartenenti ad una chat

    public function messaggichat($id)
    {
        $chat= Individual_chat::findOrFail($id)->message()->get();

        if($chat){
            $response = APIHelpers::createAPIResponse(false, 200,'', $chat);
            return response()->json($response, 200);
        } else
            return abort(404);

    }
//Cancella i messaggi di una chat

    public function deleteM($id, $idM)
    {
        $message= Individual_chat::findOrFail($id)->message()->where('idM', $idM)->delete();

        $message_delete= $message;

        if($message_delete){
            $response = APIHelpers::createAPIResponse(false, 200, 'Eliminata con successo', null);
            return response()->json($response, 200);
        }else{
            $response = APIHelpers::createAPIResponse(true, 400, 'Errore', null);
            return response()->json($response, 400);
        }

    }

//Inserimento messaggi

    public function sendM(Request $request, $id)
    {
      $chat=Individual_chat::findOrFail($id)->value('idChatI');
        
      if($chat){
          $message= new Message();

          $message-> testo = $request->testo;
          $message-> importanza = $request->importanza;
          $message-> ChatI=$id;
          $message->save();

        $response = APIHelpers::createAPIResponse(false, 200, 'inviata con successo', null);
        return response()->json($response, 200);
    }else{
        $response = APIHelpers::createAPIResponse(true, 400, 'Errore', null);
        return response()->json($response, 400);
    }
    }
    }