<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\PlacementOpportunity;
use App\Semester;
use App\Site;
use Illuminate\Http\Request;

class PlacementOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $placement_opportunities = PlacementOpportunity::all();
        return View('staff.placement-opportunities.index', [
            'placement_opportunities' => $placement_opportunities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::all();
        $semesters = Semester::all();

        return View('staff.placement-opportunities.create', [
            'semesters' => $semesters,
            'sites' => $sites
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PlacementOpportunity::create($request->validate([
            'site_id' => 'required',
            'semester_id' => 'required',
            'instructor_id' => 'required',
            'number_of_students' => 'required|numeric',
            'setting' => 'required',
            'unit' => 'required'
        ]));

        return redirect()->route('staff.placement-opportunities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlacementOpportunities  $placementOpportunities
     * @return \Illuminate\Http\Response
     */
    public function show(PlacementOpportunities $placementOpportunities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlacementOpportunities  $placementOpportunities
     * @return \Illuminate\Http\Response
     */
    public function edit(PlacementOpportunities $placementOpportunities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlacementOpportunities  $placementOpportunities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlacementOpportunities $placementOpportunities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlacementOpportunities  $placementOpportunities
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlacementOpportunities $placementOpportunities)
    {
        //
    }
}
