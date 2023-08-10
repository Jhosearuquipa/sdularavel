<?php

namespace App\Http\Controllers;

use App\Imports\EnrollmentsImport;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        return view('pages.enrollments.add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }

    public function importFile(Request $request)
    {
        $import = new EnrollmentsImport($request->course_id);

        $file = $request->file('file')->store('files');

        Excel::import($import, $file);

        notify()->success('Usuarios importados correctamente');

        // return redirect('courses/' . $request->course_id . '/enrollments', compact('duplicates'));
        //return  $duplicates;

        return redirect()->route('enrollments.add', $request->course_id);
    }
}
