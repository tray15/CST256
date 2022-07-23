@extends('layouts.appmaster')
@section('title', 'Job Search')
@section('content')
    <div class="container-fluid text-center">
        <h2 class="mt-5">Job Details</h2>
    </div>
    <div class="card col-lg-6 mx-auto mt-5">
        <div class="card-header bg-white">
            <h5 class="card-title">@php echo $jobPost->getName() @endphp</h5>
        </div>
        <div class="card-body">
            <p><strong>Details:</strong></p>
            <p>@php echo $jobPost->getdescription() @endphp</p>
        </div>
        <div class="card-footer bg-white text-center mt-5">
            <a class="btn btn-info" href="{{URL::to('/apply/'.$jobPost->getId())}}">Apply</a>
            <a class="btn btn-info" href="/jobSearch">Back to Job Search</a>
        </div>
    </div>
@endsection