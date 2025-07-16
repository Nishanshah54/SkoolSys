<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $view = $request->input('view');
        $search = $request->input('search');

        // Use soft-deleted or active teachers based on view
        if ($view === 'trash') {
            $query = Teacher::onlyTrashed();
        } else {
            $query = Teacher::query()->whereNull('deleted_at');
        }

        // Apply search if needed
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('qualification', 'like', "%{$search}%")
                    ->orWhere('specialization', 'like', "%{$search}%");
            });
        }

        // Paginate the results
        $teachers = $query->latest()->paginate(config("skoolsys.paginate_page") ?? 5);

        // Get counts
        $total = Teacher::count();
        $trashed = Teacher::onlyTrashed()->count();

        return view('admin.teacher.index', compact('teachers', 'total', 'trashed'));
    }

    public function create()
    {
        return view('admin.teacher.add-teacher');
    }

    public function store(Request $request)
    {
        Teacher::create($request->all());
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher added successfully.');
    }

    public function show(Teacher $teacher)
    {
        return view('admin.teacher.show', compact('teacher'));
    }

    public function edit()
    {

        return view('admin.teacher.add-teacher');
    }

    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher moved to trash.');
    }

    public function restore($id)
    {
        $teacher = Teacher::onlyTrashed()->findOrFail($id);
        $teacher->restore();
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher restored successfully.');
    }

    public function forceDelete($id)
    {
        $teacher = Teacher::onlyTrashed()->findOrFail($id);
        $teacher->forceDelete();
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher permanently deleted.');
    }
}
