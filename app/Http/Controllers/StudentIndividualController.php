<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentIndividualController extends Controller
{
public function timetable()
{
    $today = now()->startOfDay();
    // $timetable = Timetable::whereDate('start', $today)->orderBy('start')->get();
      $timetable = collect([
        (object)[
            'subject' => 'Mathematics',
            'room' => 'Room 101',
            'teacher' => 'Prof. John Doe',
            'start' => now()->setTime(8, 0),
            'end' => now()->setTime(9, 0),
        ],
        (object)[
            'subject' => 'Physics',
            'room' => 'Room 202',
            'teacher' => 'Dr. Jane Smith',
            'start' => now()->setTime(10, 0),
            'end' => now()->setTime(11, 0),
        ],
        (object)[
            'subject' => 'English Literature',
            'room' => 'Room 303',
            'teacher' => 'Ms. Emily Brown',
            'start' => now()->setTime(11, 30),
            'end' => now()->setTime(12, 30),
        ],
    ]);

    return view('student.timetable', compact('timetable'));
}
    public function assignments()
    {
        // Fetch or mock assignments data here
        return view('student.assignments');
    }
}