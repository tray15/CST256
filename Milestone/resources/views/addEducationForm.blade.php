@extends('layouts.appmaster') @section('title', 'Add Education Form')
@section('content')
<div class="container-fluid text-center">
	<h2 class="mt-5">Add Education</h2>

	<!-- Education History Form -->

	<form action="doCreateEducation" method="POST">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		<div class="table mt-3">
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="start_date"
						placeholder="Start Date" onfocus="(this.type='date')"
						onblur="(this.type='text')">
				</div>
				<div class="text-danger"><?php echo $errors->first('start_date')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="end_date"
						placeholder="End Date" onfocus="(this.type='date')"
						onblur="(this.type='text')">
				</div>
				<div class="text-danger"><?php echo $errors->first('end_date')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="name"
						placeholder="Name" />
				</div>
				<div class="text-danger"><?php echo $errors->first('name')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="address"
						placeholder="Address" />
				</div>
				<div class="text-danger"><?php echo $errors->first('address')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="tel" name="phone"
						placeholder="Phone" />
				</div>
				<div class="text-danger"><?php echo $errors->first('phone')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="degree"
						placeholder="Degree" />
				</div>
				<div class="text-danger"><?php echo $errors->first('degree')?></div>
			</div>
		</div>
		<div class="d-grid col-2 mx-auto">
			<input class="btn btn-success" type="submit" value="Save" />
		</div>
	</form>
</div>
@endSection
