<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $event = Event::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'notes' => $request->notes,
            'dt_start' => $request->dt_start,
            'dt_end' => $request->dt_end
        ]);
        $event->save();

        return response()->json($event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $event = Event::where("title", $request->title)->first();
        $user = User::where('id', $event->user_id)->first();
        $event->user_name = $user->name;
        $event->user_email = $user->email;
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $event = Event::where('title', $request->title)->first();

        if (!$event) {
            return 'wrong title!';
        }

        $event->title = $request->titleNew;
        $event->notes = $request->notes;
        $event->dt_start = $request->dt_start;
        $event->dt_end = $request->dt_end;
        $event->save();

        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $event = Event::where('title', $request->title)->first();
        if (!$event) {
            return 'wrong title';
        }
        $event->delete();
        return 'deleted success!';
    }
}
