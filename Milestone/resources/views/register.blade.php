@extends('layouts.appmaster')
@section('title', 'Registration Page')
@section('content')
<form action="doRegister" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	<h2>Register here!</h2>
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" /></td>
            <td><?php echo $errors->first('username')?></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="text" name="password" /></td>
            <td><?php echo $errors->first('password')?></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
           	 	<input type="submit" value="submit" />
            </td>
    </table>
</form>
@endsection