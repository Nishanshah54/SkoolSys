<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        // Step 1: Basic validation
        $validated = $request->validate([
            'grade_id'    => 'required|exists:grades,id',
            'teacher_id'  => 'required|exists:teachers,id',
            'subject_id'  => 'required|exists:subjects,id',
            'day_of_week' => 'required',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i|after:start_time',
        ]);

        // Step 2: Enforce duration limits (15 min to 2 hours)
       $start = Carbon::createFromFormat('H:i', $validated['start_time']);
        $end = Carbon::createFromFormat('H:i', $validated['end_time']);

        // Signed difference (can be negative if start is after end)
        $duration = $start->diffInMinutes($end, false);

        if ($duration < 15 || $duration > 120) {
            return back()->withErrors([
                'time' => 'Duration must be at least 15 minutes and not exceed 2 hours.'
            ])->withInput();
        }

        // Step 3: Check for schedule conflict for same teacher/day/time
        $conflict = Schedule::where('teacher_id', $validated['teacher_id'])
            ->where('day_of_week', $validated['day_of_week'])
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($q) use ($start, $end) {
                    $q->where('start_time', '<', $end->format('H:i'))
                      ->where('end_time', '>', $start->format('H:i'));
                });
            })
            ->exists();

        if ($conflict) {
            return back()->withErrors([
                'conflict' => 'Schedule conflict: This teacher already has a class at this time.',
            ])->withInput();
        }

        // Step 4: Save schedule
        $schedule = Schedule::create($validated);

        // Step 5: Logging (optional but preserved)
        $subject = Subject::select('name')->find($validated['subject_id']);
        $class_room = Grade::select('name')->find($validated['grade_id']);

        ActivityLogger::log(
            "Added new schedule for Grade: {$class_room->name}, Subject: {$subject->name}",
            'Schedule',
            $schedule->id,
            'Info'
        );

        return redirect()->route('schedules.index')->with('success', 'Schedule created!');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
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
