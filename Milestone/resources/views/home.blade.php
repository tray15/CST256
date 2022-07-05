@extends('layouts.appmaster')
@section('title', 'Home Page')
@section('content')
    <div class="container-fluid text-center">
        <h1 class="mt-5">Hello <?php echo $firstname ?></h1>
    </div>
    <div class="table mt-5">
        <div class="row m-1">
            <div class="col">
                <div class="d-grid col-6 mx-auto">
                    <a class="btn btn-info btn-lg" href="/createPortfolio">Create New Portfolio</a>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <div class="d-grid col-6 mx-auto">
                    <a class="btn btn-info btn-lg" href="/">Placeholder Button</a>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <div class="d-grid col-6 mx-auto">
                    <a class="btn btn-info btn-lg" href="/">Placeholder Button</a>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <div class="d-grid col-6 mx-auto">
                    <a class="btn btn-info btn-lg" href="/">Placeholder Button</a>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col">
                <div class="d-grid col-6 mx-auto">
                    <a class="btn btn-info btn-lg" href="/">Placeholder Button</a>
                </div>
            </div>
        </div>
    </div>
@endsection