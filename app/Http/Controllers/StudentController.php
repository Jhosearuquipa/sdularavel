<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use App\Rules\CuilRule;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class StudentController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $students = Student::limit(10)->get();

      return view('pages.students.index', compact('students'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {

      $flag_form = 0;

      return view('pages.students.add', compact('flag_form'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $request->validate([
         'cuil' => ['required', new CuilRule],
         'firstname' => 'required',
         'lastname' => 'required',
         'email' => 'required',
      ]);

      Student::create([
         'active' => 'Y',
         'user_type' => $request->user_type,
         'cuil' => $request->cuil,
         'firstname' => $request->firstname,
         'lastname' => $request->lastname,
         'email' => $request->email,
      ]);

      notify()->success(__('Los datos se guardaron correctamente.'));

      return redirect()->route('students.index');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {

      $student = Student::find($id);

      return view('pages.students.show', compact('student'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
      $student = Student::find($id);

      $flag_form = 1;

      return view('pages.students.edit', compact('student', 'flag_form'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Student $student)
   {
      $student = Student::find($request->id);

      $student->update([
         'user_type' => $request->user_type,
         'cuil' => $request->cuil,
         'firstname' => $request->firstname,
         'lastname' => $request->lastname,
         'email' => $request->email,
      ]);

      notify()->success(__('Los datos se guardaron correctamente.'));

      return redirect()->route('students.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Request $request)
   {

      $student = Student::find($request->id);

      $student->active = 'N';

      $student->save();

      notify()->success(__('El usuario fue dado de baja correctamente.'));

      return redirect()->route('students.index');
   }

   public function importFile(Request $request)
   {

      $request->validate([
         'file' => 'required',
      ]);

      Excel::import(new StudentsImport, $request->file('file')->store('files'));

      notify()->success(__('Usuaarios agregdos correctamente.'));

      return redirect()->route('students.index');
      ///return view('pages.students.import');
   }
}
