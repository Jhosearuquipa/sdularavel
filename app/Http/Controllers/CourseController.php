<?php

namespace App\Http\Controllers;

use App\Imports\CoursesImport;
use App\Models\Course;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return view('pages.courses.index', compact('courses'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flag_form = 0;

        return view('pages.courses.add', compact('flag_form'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'fh_course_start' => 'required',
            'fh_course_end' => 'required',
        ]);

        Course::create([
            'active' => 'Y',
            'name' => $request->name,
            'fh_course_start' => $request->fh_course_start,
            'fh_course_end' => $request->fh_course_end,
        ]);

        notify()->success(__('Los datos se guardaron correctamente.'));

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);

        $flag_form = 1;

        return view('pages.courses.edit', compact('course', 'flag_form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course = Course::find($request->id);

        $course->update([
            'name' => $request->name,
            'fh_course_start' => $request->fh_course_start,
            'fh_course_end' => $request->fh_course_end,
        ]);

        notify()->success(__('Los datos se guardaron correctamente.'));

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function importFile(Request $request)
    {
        Excel::import(new CoursesImport, $request->file('file')->store('files'));

        return redirect('/courses/add')->with('success', 'All good!');
    }
}