<?php

namespace App\Http\Controllers;

use App\Identification;
use Illuminate\Http\Request;

class IdentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identifications = Identification::all();

        return view('police.identifiedsuspects')->with('identifications', $identifications);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $identification = new Identification();
        $identification->criminal_id = $request->input('id');
        $identification->user_id = auth()->user()->id;
        $identification->last_seen = $request->input('location');
        $identification->details = $request->input('details');
        $identification->save();

        toastr()->success('Thank you for your info');

        return redirect('/wanted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function show(Identification $identification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function edit(Identification $identification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Identification $identification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identification $identification)
    {
        //
    }

    public function identifiedshow(Identification $identification)
    {
        return view("police.identifiedshow")->with("identification", $identification);
    }
}
