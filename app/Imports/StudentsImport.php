<?php

namespace App\Imports;

use App\Models\Student;
use App\Rules\CuilRule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return Student::updateOrCreate(
            ['cuil'          => $row['cuil']],
            [
                'method'        => 'Excel',
                'user_type'     => $row['tipo_de_usuario'],
                'firstname'     => $row['nombre'],
                'lastname'      => $row['apellido'],
                'work_email'    => $row['email'],
                'ministerio'    => $row['ministerio'],
                'reparticion'   => $row['reparticion'],
                'contract_type' => $row['modalidad_de_contratacion'],
                'area'          => $row['area'],
                'manager'       => $row['jefe_superior'],
                'email'         => $row['email_alternativo'],
                'phone'         => $row['telefono'],
                'regimen'       => $row['regimen'],
                'active'        => '1',
            ]
        );
    }

    public function rules(): array
    {
        return [
            // Above is alias for as it always validates in batches
            '*.cuil' => ['required', new CuilRule],
        ];
    }
}
