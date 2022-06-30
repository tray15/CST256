@extends('layouts.appmaster')
@section('title', 'Login Page')
@section('content')
    <form action = "doCreateProfile" method = "POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <h2>Create Profile</h2>
        <table>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $userId ?>"></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type = "text" name = "firstname" /></td>
                <td><?php echo $errors->first('firstname')?></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type = "text" name = "lastname" /></td>
                <td><?php echo $errors->first('lastname')?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type = "text" name = "address" /></td>
                <td><?php echo $errors->first('address')?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type = "tel" name = "phone" /></td>
                <td><?php echo $errors->first('phone')?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type = "email" name = "email" /></td>
                <td><?php echo $errors->first('email')?></td>
            </tr>
            <tr>
                <td colspan = "2" align = "center">
                    <input type = "submit" value = "submit" />
                </td>
        </table>
    </form>
@endsection