<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Group_chat;
use App\Helpers\APIHelpers;
use App\Message;


class GroupChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats= Group_chat::all();
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
    public function show($CodU)
    {
        $chat=DB::table('group_chats')->where('Gruppo', $CodU)->get();

        if($chat){
            $response = APIHelpers::createAPIResponse(false, 200,'', $chat);
            return response()->json($response, 200);
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
        //
    }

    public function messaggichat($id)
    {
        $chat= Group_chat::findOrFail($id)->message()->get();

        if($chat){
            $response = APIHelpers::createAPIResponse(false, 200,'', $chat);
            return response()->json($response, 200);
        } else
            return abort(404);

    }
//Cancella i messaggi di una chat

    public function deleteM($id, $idM)
    {
        $message= Group_chat::findOrFail($id)->message()->where('idM', $idM)->delete();

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
      $chat=Group_chat::findOrFail($id);
        
      if($chat){
          $message= new Message();

          $message-> testo = $request->testo;
          $message-> importanza = $request->importanza;
          $message-> ChatG=$id;
          $message->save();

        $response = APIHelpers::createAPIResponse(false, 200, 'inviata con successo', null);
        return response()->json($response, 200);
    }else{
        $response = APIHelpers::createAPIResponse(true, 400, 'Errore', null);
        return response()->json($response, 400);
    }
    }
}
