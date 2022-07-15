@extends('layouts.appmaster')
@section('title', 'Groups Page')
@section('content')
    <div class="container-fluid">
        <h2 class="text-center mt-5"> Create Group</h2>

        <!-- Begin Content -->

        <form action = "doCreateGroup" method = "POST">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <div class="table mt-5 text-center">
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "name" placeholder="Name"/></div>
                    <div class="text-danger"><?php echo $errors->first('name')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "category" placeholder="Category"/></div>
                    <div class="text-danger"><?php echo $errors->first('category')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 form-floating mx-auto">
                        <textarea class="form-control" name="description" placeholder=" Description" id="descriptionTextArea" style="height: 100px"></textarea>
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