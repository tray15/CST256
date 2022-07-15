@extends('layouts.appmaster')
@section('title', 'Groups Page')
@section('content')
    <div class="container-fluid ">
        <h2 class="mt-5 text-center">Groups</h2>

        <!-- Begin Content -->

        <div class="mt-3">
            <div class="row">
                <div class="col-lg-6 btn-group gap-2 mx-auto">
                    <a class="btn btn-info" href="/createGroup">Create New Group</a>
                    <a class="btn btn-info" href="/findGroup">Find A Group</a>
                </div>
            </div>
            <hr class="col-lg-6 mx-auto">
            <div class="col-lg-6 mx-auto ">
                <div class="mt-5 mb-3">
                    <h3>My Groups</h3>
                </div>
                @if($groupList != null)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groupList as $group)
                            <tr>
                                <td>
                                    @php echo $group->getId(); @endphp
                                </td>
                                <td>
                                    <a href="{{URL::to('/displayGroupPage/'.$group->getId())}}">@php echo $group->getName(); @endphp</a>
                                </td>
                                <td>
                                    @php echo $group->getDescription(); @endphp
                                </td>
                                <td><a class="btn btn-info"
                                       href="{{URL::to('/updateGroup/'.$group->getId())}}">Update</a></td>
                                <td><a class="btn btn-danger"
                                       href="{{URL::to('/deleteGroup/'.$group->getId())}}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h5 class="text-center">No groups found</h5>
                @endif
            </div>
            <div class="col-lg-6 mx-auto ">
                <div class="mt-5 mb-3">
                    <h3>Joined Groups</h3>
                </div>
                @if($joinedGroupList != null)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($joinedGroupList as $listItem)
                            <tr>
                                <td>
                                    @php echo $listItem->getId(); @endphp
                                </td>
                                <td>
                                    <a href="{{URL::to('/displayGroupPage/'.$listItem->getId())}}">@php echo $listItem->getName(); @endphp</a>
                                </td>
                                <td>
                                    @php echo $listItem->getDescription(); @endphp
                                </td>
                                <td><a class="btn btn-info"
                                       href="{{URL::to('/leaveGroup/'.$listItem->getId())}}">Leave</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h5 class="text-center">No groups found</h5>
                @endif
            </div>
        </div>
        </div>
    </div>
@endsection