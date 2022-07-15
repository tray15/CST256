@extends('layouts.appmaster')
@section('title', 'Join Groups Page')
@section('content')
    <div class="container-fluid ">
        <h2 class="mt-5 text-center">Join A Group</h2>
        <div class="col-lg-6 mx-auto ">
            <div class="mt-5 mb-3">
                <h3>Available Groups</h3>
            </div>
            @if($groups != null)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>
                                @php echo $group->getId(); @endphp
                            </td>
                            <td>
                                @php echo $group->getName(); @endphp
                            </td>
                            <td>
                                @php echo $group->getDescription(); @endphp
                            </td>
                            <td>
                                <input type="hidden" name="id" value="@php echo $group->getId(); @endphp"/>
                                <a class="btn btn-info" href="{{URL::to('/joinGroup/'.$group->getId())}}">Join</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-center">No groups found</h5>
            @endif
        </div>
@endsection