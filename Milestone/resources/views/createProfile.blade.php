@extends('layouts.appmaster')
@section('title', 'Login Page')
@section('content')
    <div class="container-fluid text-center">
        <h2 class="mt-5">Create Profile</h2>
        <form action = "doCreateProfile" method = "POST">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <div class="table mt-5">
                <div class="row m-2">
                    <td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
                </div>
                <div class="row m-2">
{{--                    <td>First Name:</td>--}}
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "firstname" placeholder="First Name"/></div>
                    <div class="text-danger"><?php echo $errors->first('firstname')?></div>
                </div>
                <div class="row m-2">
{{--                    <td>Last Name:</td>--}}
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "lastname" placeholder="Last Name"/></div>
                    <div class="text-danger"><?php echo $errors->first('lastname')?></div>
                </div>
                <div class="row m-2">
{{--                    <td>Address:</td>--}}
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "address" placeholder="Address"/></div>
                    <div class="text-danger"><?php echo $errors->first('address')?></div>
                </div>
                <div class="row m-2">
{{--                    <td>Phone:</td>--}}
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "tel" name = "phone" placeholder="Phone"/></div>
                    <div class="text-danger"><?php echo $errors->first('phone')?></div>
                </div>
                <div class="row m-2">
{{--                    <td>Email:</td>--}}
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "email" name = "email" placeholder="Email"/></div>
                    <div class="text-danger"><?php echo $errors->first('email')?></div>
                </div>
                <div class="d-grid col-2 mx-auto">
                    <input class="btn btn-success" type="submit" value="submit" />
                </div>
            </div>
        </form>
    </div>
@endsection