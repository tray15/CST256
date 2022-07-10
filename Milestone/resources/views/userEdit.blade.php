@extends('layouts.appmaster')

@section('title')
			Edit User
@endsection()

@section('content')
<nav class="navbar navbar-dark navbar-expand" style="background-color: #42cef5;">
    <div class="container">
        <div class=" collapse navbar-collapse justify-content-center" id="navbarText">
            <a class="navbar-brand text-center" href="/index"></a>
        </div>
    </div>
</nav>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                <h2 class="text-center" style="margin: 0px 0px 30px;">Modify User</h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/Milestone/public/admin/doUserUpdate/{{ $user->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <div class="form-group" style="text-align:left;">
                                    <label>Username</label>
                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class='form-group' style="text-align:left;">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Suspended</label>
                                        <input class="form-check-input" name="suspended" type="checkbox" id="flexSwitchCheckDefault" {{ $user->suspended == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align:left;">
                                    <label>Set Role</label>
                                    <select name="role" class="form-control" value="{{ $user->role }}">
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="Submit" class="btn btn-success">Submit</button>
                        <a href="/admin" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()

@section('scripts')


@endsection()