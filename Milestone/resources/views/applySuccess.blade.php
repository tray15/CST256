@extends('layouts.appmaster')
@section('title', 'Job Search')
@section('content')
    <div class="container-fluid text-center">
        <h2 class="mt-5">Details for @php echo $jobPost->getName() @endphp</h2>
    </div>
    <div class="fs-4 text-center mt-5">
        Your application for <strong>@php echo $jobPost->getName(); @endphp</strong> has been received!
    </div>
    <div class="text-center mt-5">
        <a class="btn btn-info" href="/jobSearch">Back to Job Search</a>
    </div>
@endsection