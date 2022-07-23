@extends('layouts.appmaster')
@section('title', 'Job Search')
@section('content')
    <div class="container-fluid text-center">
        <h2 class="mt-5">Job Search</h2>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form action="/search" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <div class="input-group">
                        <input type="text" class="form-control col-lg-6" placeholder="Search Keyword"
                               aria-label="Search Keyword" name="searchTerm">
                        <input class="btn btn-outline-secondary btn-info" type="submit" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        @if($jobs != null)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            @php echo $job->getId(); @endphp
                        </td>
                        <td>
                            @php echo $job->getName(); @endphp
                        </td>
                        <td>
                            @php echo $job->getDescription(); @endphp
                        </td>
                        <td>
                            <input type="hidden" name="id" value="@php echo $job->getId(); @endphp"/>
                            <a class="btn btn-info" href="{{URL::to('/jobDetails/'.$job->getId())}}">Details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h5 class="text-center">No jobs found</h5>
        @endif
    </div>

@endsection