@extends('layouts.appmaster') @section('title', 'Add Education Form')
@section('content')
<div class="container-fluid text-center">
	<h2 class="mt-5">Add Employment</h2>

	<!-- Employment History Form -->

	<form action="doCreateEmployment" method="POST">
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
						placeholder="Company Name" />
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
					<input class="form-control" type="text" name="phone"
						placeholder="Phone" />
				</div>
				<div class="text-danger"><?php echo $errors->first('phone')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="title"
						placeholder="Job Title" />
				</div>
				<div class="text-danger"><?php echo $errors->first('title')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="textarea" name="duties"
						placeholder="Duties" />
				</div>
				<div class="text-danger"><?php echo $errors->first('duties')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="supervisor"
						placeholder="Supervisor" />
				</div>
				<div class="text-danger"><?php echo $errors->first('supervisor')?></div>
			</div>
			<div class="row m-2">
				<div class="col-lg-4 mx-auto">
					<input class="form-control" type="text" name="separation"
						placeholder="Separation Reason" />
				</div>
				<div class="text-danger"><?php echo $errors->first('separation')?></div>
			</div>
		</div>
		<div class="d-grid col-2 mx-auto">
			<input class="btn btn-success" type="submit" value="Save" />
		</div>
	</form>
</div>

@endsection
