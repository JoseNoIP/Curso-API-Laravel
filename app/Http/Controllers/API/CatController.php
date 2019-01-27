<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;


class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::select("id", "name", "color")
        ->get();
        return $cats;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:60',
            'color' => 'required|string|max:10'
        ]);


        $cat = new Cat;

        $cat->name = $request->name;
        $cat->color = $request->color;

        $cat->save();

        return response()->json(['message' => 'El gato se creó con éxito.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Cat::find($id);

        return response()->json($cat);
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
        $cat = Cat::find($id);

        $cat->name = $request->name;
        $cat->color = $request->color;

        $cat->save();

        return response()->json(['message' => 'El gato se actualizó con éxito.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Cat::find($id);
        $cat->delete();

        return response()->json(['message' => 'El gato se eliminó con éxito.']);
    }
}
