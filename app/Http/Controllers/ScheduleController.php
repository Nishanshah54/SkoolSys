<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules=Schedule::with(['grade','teacher','subject'])->get();
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('schedules.create', [
         'grades' => Grade::all(), //
        'teachers' => Teacher::all(),
        'subjects' => Subject::all(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'grades_id' => 'required|exists:grades,id',
        'teacher_id' => 'required|exists:teachers,id',
        'subject_id' => 'required|exists:subjects,id',
        'day_of_week' => 'required',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
    ]);
    Schedule::create($validated);
    return redirect()->route('schedules.index')->with('success', 'Schedule created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
       return view('schedules.edit', [
        'schedule' => $schedule,
        'grades' => Grade::all(),
        'teachers' => Teacher::all(),
        'subjects' => Subject::all(),
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
         $validated = $request->validate([
        'grade_id' => 'required|exists:grades,id',
        'teacher_id' => 'required|exists:teachers,id',
        'subject_id' => 'required|exists:subjects,id',
        'day_of_week' => 'required',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
    ]);
    $schedule->update($validated);
    return redirect()->route('schedules.index')->with('success', 'Schedule updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
    $schedule->delete();
    return redirect()->route('schedules.index')->with('success', 'Schedule deleted.');
    }
}