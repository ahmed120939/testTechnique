<?php

namespace App\Http\Controllers;

use App\Models\TypeReclamation;
use App\Http\Requests\StoreTypeReclamationRequest;
use App\Http\Requests\UpdateTypeReclamationRequest;
use Illuminate\Http\Request;

class TypeReclamationController extends Controller
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
    public function create(Request $request)
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeReclamationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req=new TypeReclamation();
        $req->nom=$request->nom;
        $req->save();
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function show(TypeReclamation $typeReclamation)
    {
        //
    }
    public function showAll()
    {
        return TypeReclamation::all();

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeReclamation $typeReclamation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeReclamationRequest  $request
     * @param  \App\Models\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeReclamationRequest $request, TypeReclamation $typeReclamation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeReclamation $typeReclamation)
    {
        //
    }
}
