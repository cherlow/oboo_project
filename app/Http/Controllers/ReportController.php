<?php

namespace App\Http\Controllers;

use App\Crime;
use App\Report;
use App\Station;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        $crimes = Crime::all();
        $stations = Station::all();
        return view('user.reportcrime')->with('crimes', $crimes)->with('stations', $stations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report();
        $report->user_id = auth()->user()->id;
        $report->crime_id = $request->input('crime');
        $report->details = $request->input('details');
        $report->location = $request->input('location');
        $report->station_id = $request->input('station');

        $report->save();

        toastr()->success('report submitted successfully');
        return redirect('/reportcrime');
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function reportedcrimes()
    {

        $reports = auth()->user()->station->reports;

        return view('police.reportedcrimes')->with('reports', $reports);
    }
    public function myreports()
    {
        $reports = auth()->user()->reports;
        return view('user.myreports')->with('reports', $reports);
    }
}
