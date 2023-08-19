<?php

namespace App\Imports;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EnrollmentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    private $students,
        $grades,
        $course_id;

    private $duplicates = [];

    public function __construct($course_id)
    {
        $this->students = Student::pluck('id', 'cuil');
        $this->grades = Grade::pluck('id', 'remark');
        //$this->course_id = $course_id;
    }

    public function model(array $row)
    {

        if (isset($row['id_curso'])) {
            $existingEnrollment = Enrollment::where('student_id', $this->students[$row['cuil']])
                ->where('course_id', $row['id_curso'])
                ->first();

            if ($existingEnrollment) {
                // Ya existe una inscripción con el mismo student_id para el mismo curso
                // Puedes realizar aquí las acciones necesarias en caso de duplicado
                return null;
            } else {
                return new Enrollment([
                    'active'        => '1',
                    'course_id'     => $row['id_curso'],
                    'student_id'    => $this->students[$row['cuil']],
                    //'attendance'    => $this->grades[$row['asistencia']],
                    'marks_id'      => $this->grades[$row['acta']],
                    'created_by'    => auth()->user()->name,
                    'updated_by'    => auth()->user()->name,
                ]);
            }
        } else {
            return null;
        }
    }
}