<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Calendar_2Controller extends Controller
{
    //
    public function index()
    {
        return view('calendar_2');
    }
    
    public function create()
    {
        //

        $events = Task::where('user_id', Auth::id())->get();

        $events = $events->map(function ($e) {
            return [
                "id" => $e->id,
                "start" => $e->start,
                "end" => $e->end,
                "owner" => $e->user_id,
                "color" => "#d2aad2",
                "passed" => false,
                "title" => $e->name,
                "description" => $e->description,
                "Priorité"=> $e->priority,

            ];
        });

        return response()->json([
            "events" => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "start" => "required",
            "end" => "required"
        ]);

        Calendar::create([
            "start" => $request->start . ":00",
            "end" => $request->end . ":00",
            "user_id" => Auth::user()->id
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
        dd();
        $request->validate([
            "start" => "required",
            "end" => "required"
        ]);

        $calendar->update([
            "start" => $request->start,
            "end" => $request->end
        ]);

        return back();
        // dd("jkh");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //

        $calendar->delete();
        return back();
    }
}
