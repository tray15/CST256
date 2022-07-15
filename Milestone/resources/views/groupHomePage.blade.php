@extends('layouts.appmaster')
@section('title', 'Groups Page')
@section('content')
    <div class="container-fluid ">
        <h2 class="mt-5 text-center">@php echo $group->getName(); @endphp</h2>

        <!-- Begin Content -->
        <div class="row">
            <div class="col-sm-2 ">
                <div class="fs-3 text-center mb-3">
                    <strong>Members</strong>
                </div>
                @foreach($memberList as $member)
                    <div class="fs-5 text-center">
                        <strong>@php echo $member->getFirstname(); @endphp</strong>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-10 ">
                <div class="fs-3 mb-3">
                    <strong>Comments</strong>
                </div>
                @foreach($comments as $comment)
                    <div class="">
                        <span class="fs-6"><strong>@php echo $comment->firstname . " " . $comment->lastname@endphp</strong></span>
                        <p>
                            @php echo $comment->text; @endphp
                        </p>
                    </div>
                    <hr class="col-lg-8 ">
                @endforeach
                <div class="m-3 col-lg-8">
                    <form action="/submitComment" method="post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        <div class="input-group mb-3">
                            <input type="hidden" name="id" value="@php echo $group->getId(); @endphp">
                            <input type="text" class="form-control" name="comment" placeholder="New Comment" aria-label="New Comment" aria-describedby="button-addon2">
                            <input class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection