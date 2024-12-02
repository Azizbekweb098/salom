<?php

namespace App\Http\Controllers;

use App\Http\Resources\TudoResource;
use App\Jobs\SendTodoNotification;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'due_time' => 'required|date|after:now',
        ]);

        $todo = Todo::create($data);

        // Jobni queueni yuborish
        $sendAt = Carbon::parse($todo->due_time);
        $delay = $sendAt->diffInSeconds(now());

        SendTodoNotification::dispatch($todo)->delay(now()->addSeconds($delay));

        return response()->json($todo, 201);
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
