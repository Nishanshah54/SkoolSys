<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with(['grade', 'teacher', 'subject'])
            ->paginate(config('skoolsys.paginate_page') ?? 10);
        $teachers_count = Schedule::distinct('teacher_id')->count('teacher_id');
        return view('schedules.index', compact('schedules', 'teachers_count'));
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
        try {
            $validated = $request->validate([
                'grade_id' => 'required|exists:grades,id',
                'teacher_id' => 'required|exists:teachers,id',
                'subject_id' => 'required|exists:subjects,id',
                'day_of_week' => 'required',
                'start_time' => 'required',
                'end_time' => 'required|after:start_time',
            ]);

            $schedule = Schedule::create($validated);

            // Fetch related subject and grade for logging
            $subject = Subject::select('name')->find($request->subject_id);
            $class_room = Grade::select('name')->find($request->grade_id);

            // Optional: Check if this is crashing
            ActivityLogger::log(
                "Added new schedule for Grade ID: {$class_room->name}, Subject Name: {$subject->name}",
                'Schedule',
                $schedule->id,
                'Info'
            );

            return redirect()->route('schedules.index')->with('success', 'Schedule created!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
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
        return view('schedules.create', [
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
        // Validate the incoming request
        $validated = $request->validate([
            'grade_id'    => 'required|exists:grades,id',
            'teacher_id'  => 'required|exists:teachers,id',
            'subject_id'  => 'required|exists:subjects,id',
            'day_of_week' => 'required',
            'start_time'  => 'required',
            'end_time'    => 'required|after:start_time',
        ]);

        // Update the schedule record
        $schedule->update($validated);

        // Fetch related subject and grade for logging
        $subject = Subject::select('name')->find($request->subject_id);
        $class_room = Grade::select('name')->find($request->grade_id);

        // Log the update activity
        ActivityLogger::log(
            "Updated schedule for Grade: {$class_room->name}, Subject: {$subject->name}",
            'Schedule',
            $schedule->id, // Use the actual schedule ID, not $request->id
            'Info'
        );

        // Redirect back with a success message
        return redirect()->route('schedules.index')->with('success', 'Schedule updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        $subject = Subject::select('name')->find($schedule->subject_id);
        $class_room = Grade::select('name')->find($schedule->grade_id);

        ActivityLogger::log(
            "Schedule for {$class_room->name} was deleted, Subject Name: {$subject->name}",
            'Schedule',
            $schedule->id,
            'Warning'
        );
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted.');
    }
}
