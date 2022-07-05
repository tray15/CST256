@extends('layouts.appmaster')
@section('title', 'Portfolio Page')
@section('content')
    <div class="container-fluid text-center">
        <h2 class="mt-5">Update Employment</h2>

        <!-- Employment History Form -->

        <form action = "doUpdateEmployment" method = "POST">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <div class="table mt-3">
                <div class="row m-2">
                    <input type="hidden" name="id" value="<?php echo $record->id ?>">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type="text" name="start_date" value="<?php echo $record->start_date ?>"
                                                         onfocus="(this.type='date')"
                                                         onblur="(this.type='text')"></div>
                    <div class="text-danger"><?php echo $errors->first('start_date')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type="text" name="end_date" value="<?php echo $record->end_date ?>"
                                                         onfocus="(this.type='date')"
                                                         onblur="(this.type='text')"></div>
                    <div class="text-danger"><?php echo $errors->first('end_date')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "name" value="<?php echo $record->company_name ?>"/></div>
                    <div class="text-danger"><?php echo $errors->first('name')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "address" value="<?php echo $record->address ?>" /></div>
                    <div class="text-danger"><?php echo $errors->first('address')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "phone" value="<?php echo $record->phone ?>" /></div>
                    <div class="text-danger"><?php echo $errors->first('phone')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "title" value="<?php echo $record->job_title ?>" /></div>
                    <div class="text-danger"><?php echo $errors->first('title')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "textarea" name = "duties" value="<?php echo $record->duties ?>" /></div>
                    <div class="text-danger"><?php echo $errors->first('duties')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "text" name = "supervisor" value="<?php echo $record->supervisor ?>" /></div>
                    <div class="text-danger"><?php echo $errors->first('supervisor')?></div>
                </div>
                <div class="row m-2">
                    <div class="col-lg-4 mx-auto"><input class="form-control" type = "textarea" name = "separation" value="<?php echo $record->separation_reason ?>" /></div>
                    <div class="text-danger"><?php echo $errors->first('separation')?></div>
                </div>
            </div>
            <div class="d-grid col-2 mx-auto">
                <input class="btn btn-success" type = "submit" value = "Save" />
            </div>
        </form>
    </div>

@endsection