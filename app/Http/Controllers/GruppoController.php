<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;

class GruppoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups= Group::all();
        return view('groups')->with('groups',$groups);
    }

    public function usergroups($idUtente)
    {

        $user=User::where('id',$idUtente)->get();

        $groups=User::find($idUtente)->group()->get();
        
        
        if($groups){
            //$response = APIHelpers::createAPIResponse(false, 200,'', $groups);
            return 
                view('groups')
                ->with('groups',$groups)
                ->with('user',$user);

        } else
            return abort(404);
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
        $gruppo= new Groups();
        $gruppo-> Membri = $request->Membri;
        $gruppo-> nome = $request->nome;
        $gruppo-> descrizione = $request->descrizione;
        $gruppo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodU,$id)
    {
        $user=User::find($id);
        $gruppo = Group::find($CodU);
        return view('group')->with('group',$gruppo)->with('user',$user);
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
        
            $gruppo = gruppo:: find ($id);
            $gruppo-> nome = $request->nome;
            $gruppo-> descrizione = $request->descrizione;
            $gruppo-> save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodU)
    {
        $gruppo = gruppo ::find($CodU);
        $gruppo-> delete();
    }
}
