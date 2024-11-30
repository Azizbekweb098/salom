<?php

namespace App\Http\Controllers;

use App\Http\Resources\TudoResource;
use Illuminate\Http\Request;
use App\Models\Todo;

class TudoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return response(TudoResource::collection(Todo::all()));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if(!$requestData){
            return response()->json(['xat' => 'xatolik']);
        }

        Todo::create($requestData);

        return response()->json($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tudo = Todo::find($id);

        if(!$tudo){
            return response()->json($tudo);
        }

        return response()->json($tudo);
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
        $todo = Todo::find($id);
        if ($todo) {
            $todo->update($request->all());
        }
        $todo->update($request->all());

        return response()->json(['xat' => 'mufaqiyatli yaratildi']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestData = Todo::find($id);

        if($requestData){
            $requestData->delete();
        }
        return response()->json(['xat' => 'mufaqiyatli ochirildi']);
    }
}
