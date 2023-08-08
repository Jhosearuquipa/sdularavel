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

    private $students, $grades;

    public function __construct()
    {
        $this->students = Student::pluck('id', 'cuil');
        $this->grades = Grade::pluck('id', 'remark');
    }

    public function model(array $row)
    {
        return new Enrollment([
            'active'        => 'Y',
            'course_id'     => $row['curso'],
            'student_id'    => $this->students[$row['cuil']],
            'attendance'    => $this->grades[$row['asistencia']],
            'marks'         => $this->grades[$row['acta']],
        ]);
    }
}