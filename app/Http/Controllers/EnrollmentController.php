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
    public function create()
    {
        return view('pages.enrollments.add');
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
        Excel::import(new EnrollmentsImport, $request->file('file')->store('files'));

        notify()->success('Usuarios importados correctamente');

        return redirect('courses/3/enrollments');
    }
}