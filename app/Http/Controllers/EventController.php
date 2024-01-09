<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Http\Requests\StoreEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        foreach ($events as $event) {
            $event->dt_start = date('Y-m-d',strtotime($event->dt_start));
            $event->dt_end = date('Y-m-d',strtotime($event->dt_end));
        }

        return view('events.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('events.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();
        $event = Event::create([
            'user_id' => $validated['user'],
            'title' => $validated['title'],
            'notes' => $validated['notes'],
            'dt_start' => $validated['dt_start'],
            'dt_end' => $validated['dt_end'],
        ]);
        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return view('events.event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        $users = User::all();
        $event->dt_start = date('Y-m-d',strtotime($event->dt_start));
        $event->dt_end = date('Y-m-d',strtotime($event->dt_end));

        return view('events.edit', [
            'event' => $event,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEventRequest $request, string $id)
    {
        $validated = $request->validated();
        $event = Event::find($id);
        $event->user_id = $validated['user'];
        $event->title = $validated['title'];
        $event->notes = $validated['notes'];
        $event->dt_start = date('Y-m-d',strtotime($validated['dt_start']));
        $event->dt_end = date('Y-m-d',strtotime($validated['dt_end']));
        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('events.index');
    }
}
