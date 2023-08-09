<?php

namespace App\Imports;

use App\Models\CertificateType;
use App\Models\Convocatoria;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Modality;
use App\Models\Project;
use App\Models\System;
use App\Models\User;
use App\Models\UserType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoursesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    private $modality,
        $system,
        $usertype,
        $convocatoria,
        $project,
        $certificateType,
        $courseType,
        $capacitador;

    public function __construct()
    {
        $this->modality = Modality::pluck('id', 'name');
        $this->system = System::pluck('id', 'name');
        $this->usertype = UserType::pluck('id', 'user_type');
        $this->convocatoria = Convocatoria::pluck('id', 'type');
        $this->project = Project::pluck('id', 'name');
        $this->certificateType = CertificateType::pluck('id', 'name');
        $this->courseType = CourseType::pluck('id', 'type');
        $this->capacitador = User::pluck('id', 'name');
    }

    public function model(array $row)
    {
        return new Course([
            'other_id'            => $row['id_isc'],
            'campus_id'           => $row['id_campus'],
            'course_catalogue_id' => '0',
            'name'                => $row['nombre'],
            'fh_course_start'     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_de_inicio']),
            'fh_course_end'       => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_de_fin']),
            'cant_day'            => $row['cantidad_de_dias'],
            'cant_hour'           => $row['cantidad_de_horas'],
            'modality_id'         => $this->modality[$row['modalidad']],
            'system_id'           => $this->system[$row['sistema']],
            'module_id'           => $row['modulo'],
            'user_type_id'        => $this->usertype[$row['tipo_de_usuario']],
            'convocatoria_id'     => $this->convocatoria[$row['tipo_de_convocatoria']],
            'certificate_id'      => ($row['certificado'] == 'Si') ? 1 : 0,
            'certificated_by_id'  => $this->certificateType[$row['tipo_de_certificado']],
            'project_id'          => $this->project[$row['proyecto_cartera']],
            'course_type_id'      => $this->courseType[$row['tipo_de_capacitacion']],
            'professor_id'        => $this->capacitador[$row['capacitador']],
            'professor2_id'       => $this->capacitador[$row['segundo_capacitador']],
            'sede'                => $row['sede'],
            'category'            => $row['categoria'],
            'platform'            => $row['plataforma'],
            'meet_date'           => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['encuentro_en_vivo']),
            'comments'            => $row['comentarios'],
            'active'              => 'Y',
            'created_by'          => auth()->user()->name,
            'updated_by'          => auth()->user()->name,
        ]);
    }
}