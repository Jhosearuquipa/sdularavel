<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['other_id', 'campus_id', 'course_catalogue_id', 'name', 'fh_course_start', 'fh_course_end', 'cant_day', 'cant_hour', 'modality_id', 'system_id', 'module_id', 'user_type_id', 'convocatoria_id', 'certificate_id', 'certificated_by_id', 'project_id', 'course_type_id', 'professor_id', 'professor2_id', 'sede', 'ategory', 'platform', 'meet_date', 'comments', 'active', 'leaving_date', 'leaving_reason', 'created_by', 'updated_by'];
}