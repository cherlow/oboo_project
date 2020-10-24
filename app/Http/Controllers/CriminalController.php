<?php

namespace App\Http\Controllers;

use App\Crime;
use App\Criminal;
use App\Report;
use Illuminate\Http\Request;

class CriminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criminals = Criminal::all();
        return view('police.wantedcriminals')->with('criminals', $criminals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crimes = Crime::all();
        return view('police.newcrime')->with('crimes', $crimes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $item = $request->file('pic');
        $extension = $item->getClientOriginalExtension(); // getting image extension

        $filename = time() . '.' . $extension;
        $item->move('uploads/', $filename);


        $criminal = new Criminal();
        $criminal->name = $request->input('name');
        $criminal->alias = $request->input('alias');
        $criminal->national_id = $request->input('id');
        $criminal->age = $request->input('age');
        $criminal->details = $request->input('details');
        $criminal->gender = $request->input('gender');
        $criminal->location = $request->input('location');
        $criminal->crime_id = $request->input('select');
        $criminal->station_id = auth()->user()->station->id;
        $criminal->pic = $filename;
        $criminal->police_id = auth()->user()->id;
        $criminal->is_loose = $request->input('is_wanted') == 'true' ? true : false;
        $criminal->save();

        toastr()->success('record saved successfully');

        return redirect('/newcrime');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function show(Criminal $criminal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function edit(Criminal $criminal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criminal $criminal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criminal $criminal)
    {
        //
    }

    public function wanted()
    {

        $criminals = Criminal::all();
        return view('user.wanted')->with('criminals', $criminals);
    }

    public function wanteddetails(Criminal $criminal)
    {

        if (auth()->user()->role == 2) {

            return view('police.crimedetails')->with('criminal', $criminal);
        } else if (auth()->user()->role == 3) {
            return view('user.criminaldetails')->with('criminal', $criminal);
        } else {

            return view('admin.criminaldetails')->with('criminal', $criminal);
        }
    }

    public function crimerecords()
    {

        return view('police.crimerecords');
    }

    public function search(Request $request)
    {
        $records = Criminal::search($request->input('search'))->get();

        if (count($records) < 1) {
            toastr()->info("no records found....please refine your search");
            return redirect('/crimerecords');
        }

        if (auth()->user()->role == 2) {

            return view('police.crimerecordsshow')->with('criminals', $records);
        } else {

            return view('admin.crimerecordsshow')->with('criminals', $records);
        }
    }

    public function changestatus(Criminal $criminal)
    {

        if ($criminal->is_loose == 1) {

            // archiving

            $criminal->is_loose = 0;

            $criminal->save();

            toastr()->success('criminal record archived successfully');

            return redirect("/wanted/" . $criminal->id);
        } else {
            // added to the wanted watch list

            $criminal->is_loose = 1;

            $criminal->save();

            toastr()->success('criminal record added to the wanted watch list');

            return redirect("/wanted/" . $criminal->id);
        }
    }

    public function crimereportshow(Report $report)
    {




        return view("police.crimereportshow")->with("report", $report);
    }

    public function admincrimereportshow(Report $report)
    {




        return view("admin.crimereportshow")->with("report", $report);
    }
}
