<?php

namespace App\Http\Controllers\Admin\Gusthouse;

use App\Http\Controllers\Controller;
use App\Models\GuestHousePackege;
use Illuminate\Http\Request;

class GuestHousePackegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packeges = GuestHousePackege::all();
        return view('admin.guestHouse.guestPackege.index',[
            'albums'=>$packeges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guestHouse.guestPackege.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'head'=> 'required|string',
            'title'=> 'required|string',
            'details'=> 'required|string',
            'price'=> 'required|numeric',
        ];
        $validateData = $request->validate($rules);

        GuestHousePackege::create($validateData);
        return redirect()->route('guesthousepackege.index')->withSuccess('packege create successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuestHousePackege $guesthousepackege)
    {
        return view('admin.guestHouse.guestPackege.edit',[
            'guesthousepackege'=>$guesthousepackege
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuestHousePackege $guesthousepackege)
    {
        $rules = [
            'head'=> 'required|string',
            'title'=> 'required|string',
            'details'=> 'required|string',
            'price'=> 'required|numeric',
        ];
        $validateData = $request->validate($rules);

        $guesthousepackege->update($validateData);
        return redirect()->route('guesthousepackege.index')->withSuccess('packege update successfull!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestHousePackege $guesthousepackege)
    {
        $guesthousepackege->delete();
        return back()->withSuccess('deleted!');
    }
}
