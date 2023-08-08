<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">Tipo de usuario</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="inputPassword" name="user_type" value="{{  ($flag_form == 0) ? old('user_type') : $student->user_type ; }} "> 
	</div>
</div>
<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">CUIL</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="inputPassword" name="cuil" value="{{  ($flag_form == 0) ? old('cuil') : $student->cuil ; }}">
	</div>
</div>
<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">Nombre</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="inputPassword" name="firstname" value="{{  ($flag_form == 0) ? old('firstname') : $student->firstname ; }}">
	</div>
</div>
<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">Apellido</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="inputPassword" name="lastname" value="{{  ($flag_form == 0) ? old('lastname') : $student->lastname ; }}">
	</div>
</div>
<div class="mb-3 row">
	<label for="inputPassword" class="col-sm-2 col-form-label text-end">Email</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="inputPassword" name="email" value="{{  ($flag_form == 0) ? old('email') : $student->email ; }}">
	</div>
</div>
