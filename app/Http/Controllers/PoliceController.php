<?php

namespace App\Http\Controllers;

use App\Police;
use App\Station;
use App\User;
use Illuminate\Http\Request;

class PoliceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $polices=User::where('role',2)->get();

        return view('admin.police')->with('stations', $stations)->with('polices',$polices);
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
        if ($request->hasFile('image')) {
            $item = $request->file('image');
            $extension = $item->getClientOriginalExtension(); // getting image extension

            $filename = time() . '.' . $extension;
            $item->move('uploads/', $filename);
        }
        // return $request;
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('id'));
        $user->cover_pic = $filename;
        $user->police_number = $request->input('id');
        $user->station_id = $request->input('station');
        $user->role = 2;
        $user->save();
        toastr()->success('Police Officer Created Successfully');

      
        return redirect('/police');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Police  $police
     * @return \Illuminate\Http\Response
     */
    public function show(Police $police)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Police  $police
     * @return \Illuminate\Http\Response
     */
    public function edit(Police $police)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Police  $police
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Police $police)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Police  $police
     * @return \Illuminate\Http\Response
     */
    public function destroy(Police $police)
    {
        //
    }
}
