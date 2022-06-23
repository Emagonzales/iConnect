<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use Illuminate\Support\Facades\DB;


use App\Post;
use App\User;
use App\Group;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        $response = APIHelpers::createAPIResponse(false, 200,'', $posts);
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
    public function store(Request $request,$codU,$id)
    {
        $post= new Post();
        $post-> Titolo = $request->Titolo;
        $post-> Importanza = $request->Importanza;
        $post-> contenuto = $request->contenuto;
        $nuovo_post=$post->save();

        
        $query1=DB::table('post_user')->insert(
            ['Utente' => $id, 'Post'=> $post->idP]
        );

        $query2=DB::table('group_post')->insert(
            ['Gruppo' => $codU, 'Post'=> $post->idP]
        );

        $gruppo = Group::find($codU);
        $user = User::find($id)->value('nome');
        

        if($nuovo_post){
            $response = APIHelpers::createAPIResponse(false, 200, 'inserita con successo', null);
            return view('group')->with('group', $gruppo)->with('user',$user);
        }else{
            $response = APIHelpers::createAPIResponse(true, 400, 'Errore', null);
            return response()->json($response, 400);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codU)
    {

        $posts=Group::findOrFail($codU)->post()->get();
           
        if($posts){
            $response = APIHelpers::createAPIResponse(false, 200,'', $posts);
            return $posts;
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
    public function update(Request $request, $idP)
    {
        
            $post = Post:: find ($idP);
            $post-> Titolo = $request->titolo;
            $post-> contenuto = $request->contenuto;
           $post_aggiornato=$post-> save();

            if($post_aggiornato){
                $response = APIHelpers::createAPIResponse(false, 200, 'Aggiornamento del post effettuato con successo', null);
                return response()->json($response, 200);
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
    public function destroy($idP)
    {
        $post = Post::find($idP);
        $post_eliminato=$post-> delete();
        
        if($post_eliminato){
            $response = APIHelpers::createAPIResponse(false, 200, 'Eliminato', null);
            return response()->json($response, 200);
        }else{
            $response = APIHelpers::createAPIResponse(true, 400, 'Errore', null);
            return response()->json($response, 400);
        }
    }
}
