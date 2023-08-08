<?php

namespace App\Imports;

use App\Models\Student;
use App\Rules\CuilRule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'active'     => 'Y',
            'user_type'     => $row['tipo_usuario'],
            'cuil'    => $row['cuil'],
            'firstname'    => $row['nombre'],
            'lastname'    => $row['apellido'],
            'email'    => $row['email'],
        ]);
    }

    public function rules(): array
    {
        return [
            // Above is alias for as it always validates in batches
            '*.cuil' => ['required', 'unique:students', new CuilRule],
        ];
    }
}