@extends('layouts.appmaster')
@section('title', 'Groups Page')
@section('content')
    <div class="container-fluid">
        <h2 class="text-center mt-5">Update Group</h2>

        <!-- Begin Content -->

        <form action = "doUpdateGroup" method = "POST">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <div class="table mt-5 text-center">
                <div class="row m-2">
                    <div><input type="hidden" name="id" value="@php echo $group->getId(); @endphp"/></div>
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "name" value="@php echo $group->getName(); @endphp "/></div>
                    <div class="text-danger"><?php echo $errors->first('name')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "category" value="@php echo $group->getCategory(); @endphp "/></div>
                    <div class="text-danger"><?php echo $errors->first('category')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 form-floating mx-auto">
                        <textarea class="form-control" name="description" placeholder="Description" id="descriptionTextArea" style="height: 100px">@php echo $group->getDescription(); @endphp</textarea>
                        <label for="descriptionTextArea text-light">Description</label>
                    </div>
                    <div class="text-danger"><?php echo $errors->first('description')?></div>
                </div>
                <div class="d-grid col-2 mx-auto">
                    <input class="btn btn-success" type="submit" value="submit" />
                </div>
            </div>
        </form>
    </div>
@endsection