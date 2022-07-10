@extends('layouts.appmaster')

@section('title')
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
          <h2 class="text-center" style="margin: 0px 0px 30px;">Admin Panel</h2>
        </div>
      </div>
    </div>
</div>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Users</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Username</th>
              <th>Role</th>
              <th>Suspended</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              <!--fetch table data -->
              @foreach($users as $row)
              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->role }}</td>
                <td>{{ $row->suspended == 1 ? 'Yes' : 'No' }}</td>
                <td>
                  <a href="admin/editUser/{{ $row->id }}" class="btn btn-success">EDIT</a>
                </td>
                <td>
                  <form action="admin/deleteUser/{{ $row->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">DELETE</button>
                  </form>
                </td>
              </tr>
              @endforeach()
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection()