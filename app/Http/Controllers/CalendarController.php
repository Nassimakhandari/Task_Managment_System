<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Creation;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('calendar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $events = Creation::where('user_id', Auth::id())->get();

        $events = $events->map(function ($e) {
            return [
                "id" => $e->id,
                "start" => $e->start,
                "end" => $e->end,
                "owner" => $e->user_id,
                "color" => "#d2aad2",
                "passed" => false,
                "title" => $e->name_todo,
                "description" => $e->description_todo,
                "Priorité"=> $e->priority_todo,

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
