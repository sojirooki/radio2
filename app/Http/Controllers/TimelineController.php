<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Program;

class TimelineController extends Controller
{
    public function index(Timeline $timeline)
    {
        return view('timelines.index')->with(['timelines' => $timeline->getPaginateByLimit()]);
    }
    
    public function show(Timeline $timeline)
    {
        return view('timelines.show')->with(['timeline' => $timeline]);
    }
    
    public function create(Program $program)
    {
        return view('timelines/create')->with(['programs' => $program->get()]);
    }
    
    public function store(Timeline $timeline, Request $request)
    {
        $timeline->user_id = \Auth::id();
        $input = $request['timeline'];
        $timeline->fill($input)->save();
        return redirect('/timelines/' . $timeline->id);
    }
    
    public function edit(Timeline $timeline, Program $program)
    {
        return view('timelines.edit')->with(['timeline' => $timeline, 'programs' => $program->get()]);
    }
    
    public function update(Request $request, Timeline $timeline)
    {
        $input_timeline = $request['timeline'];
        $timeline->fill($input_timeline)->save();
        return redirect('/timelines/' . $timeline->id);
    }
}