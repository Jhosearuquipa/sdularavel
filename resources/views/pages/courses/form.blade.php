<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">Nombre de la capacitación</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="inputPassword" name="name" value="{{  ($flag_form == 0) ? old('name') : $course->name ; }} "> 
	</div>
</div>
<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">Fecha de inicio </label>
	<div class="col-sm-10">
		<input type="datetime-local" class="form-control" id="inputPassword" name="fh_course_start" value="{{  ($flag_form == 0) ? old('fh_course_start') : $course->fh_course_start ; }}">
	</div>
</div>
<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">Fecha de fin</label>
	<div class="col-sm-10">
		<input type="datetime-local" class="form-control" id="inputPassword" name="fh_course_end" value="{{  ($flag_form == 0) ? old('fh_course_end') : $course->fh_course_end ; }}">
	</div>
</div>