<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Http\Requests\StoreReclamationRequest;
use App\Http\Requests\UpdateReclamationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TypeReclamation;


class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreReclamationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rec = new Reclamation();
        $rec->desc = $request->desc;
        $user = User::find($request->user_id);
        if ($user == null){
            return response([
                "message" => "Utilisateur n'existe pas"
            ],404); 
        }
       
        $tr = TypeReclamation::find($request->type_reclamation_id);
        if ($tr == null){
            return response([
                "message" => "Type reclamation n'existe pas"
            ],404); 
        }
        $rec->user_id = $request->user_id;
        $rec->type_reclamation_id = $request->type_reclamation_id;
        $rec->save();
        return response([
            "message" => "Succes"
        ],200); 


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $rec = Reclamation::find($id);
        $result = $rec;
        $result['user'] = $rec->user;
        $result['type_reclamation'] = $rec->typeReclamation;
        unset($result->user_id);
        unset($result->type_reclamation_id);
        unset($result->typeReclamation);
        return $result;
    }
    public function showAll()
    {
        $recs = Reclamation::all();
        foreach ($recs as $rec ){
       
        $rec['user'] = $rec->user;
        $rec['type_reclamation'] = $rec->typeReclamation;
        unset($rec->user_id);
        unset($rec->type_reclamation_id);
        unset($rec->typeReclamation);
        
        }
        return $recs;
    }
    public function showByUser(int $user_id)
    {
        $recs=Reclamation:: where('user_id', '=', $user_id)->get();
        
        foreach ($recs as $rec ){
       
            $rec['user'] = $rec->user;
            $rec['type_reclamation'] = $rec->typeReclamation;
            unset($rec->user_id);
            unset($rec->type_reclamation_id);
            unset($rec->typeReclamation);
            
            }
            return $recs;
    }


   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamation $reclamation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReclamationRequest  $request
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReclamationRequest $request, Reclamation $reclamation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $reclamation = Reclamation::find($id);
        if ($reclamation == null){
            return response([
                "message" => "Reclamation  non trouver"
            ],404);
        }

        Reclamation::destroy($id);
        return response([
            "message" => "supprition avec succes"
        ],200); 

    }
}
