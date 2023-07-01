<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Program;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function index(Timeline $timeline)
    {
        $user = auth()->user();
        //$timeline = Timeline::withCount('timeline_likes')->with('program')->orderBy('updated_at', 'DESC')->paginate(5);
        //$timeline = Timeline::withCount('timeline_likes')->get();
        return view('timelines.index')->with(['timelines' => $timeline->withCount('likes')->with('program')->orderBy('updated_at', 'DESC')->paginate(5)]);
        //return view('timelines.index')->with(['timelines' => $timeline->getPaginateByLimit()]);
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
    
    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $timeline_id = $request->timeline_id;
        $already_liked = Like::where('user_id', $user_id)->where('timeline_id', $timeline_id)->first(); 
        if (!$already_liked) { 
            $like = new Like;
            $like->timeline_id = $timeline_id;
            $like->user_id = $user_id;
            $like->save();
            } else {
            Like::where('timeline_id', $timeline_id)->where('user_id', $user_id)->delete();
            }
        $timeline_likes_count = Timeline::withCount('likes')->findOrFail($timeline_id)->likes_count;
        $param = [
            'timeline_likes_count' => $timeline_likes_count,
        ];
        return response()->json($param);
    }
}