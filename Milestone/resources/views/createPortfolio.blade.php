@extends('layouts.appmaster')
@section('title', 'Portfolio Page')
@section('content')
    <div class="container-fluid text-center">
        <h2 class="mt-5">Create Portfolio</h2>

        <!--Begin Accordion-->

        <div class="accordion col-lg-8 mx-auto" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Education History
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php if($records != null) { ?>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <!--<th>ID</th>-->
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>School Name</th>
                                    <th>School Address</th>
                                    <th>School Phone</th>
                                    <th>Degree Earned</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($records as $record) { ?>
                                <tr>
                                    <!--<td> ?php echo $edu->getId() ?></td>-->
                                    <td nowrap="true"><?php echo $record->getStartDate(); ?></td>
                                    <td nowrap="true"><?php echo $record->getEndDate(); ?></td>
                                    <td><?php echo $record->getSchoolName(); ?></td>
                                    <td><?php echo $record->getAddress(); ?></td>
                                    <td><?php echo $record->getPhone(); ?></td>
                                    <td><?php echo $record->getDegree(); ?></td>
                                    <td><a class="btn btn-info" href="{{URL::to('/updateEducation/'.$record->getId())}}">Update</a></td>
                                    <td><a class="btn btn-danger" href="{{URL::to('/deleteEducation/'.$record->getId())}}">Delete</a></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        <?php } else { echo "No Education History Found"; } ?>
                            <div class="mt-3">
                                <a class="btn btn-success" href="/addEducationForm">Add Education</a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Employment History
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php if($jobRecords != null) { ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <!--<th>ID</th>-->
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Company Name</th>
                                <th>Company Address</th>
                                <th>Company Phone</th>
                                <th>Job Title</th>
                                <th>Duties</th>
                                <th>Supervisor</th>
                                <th>Separation Reason</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($jobRecords as $job) { ?>
                            <tr>
                                <!--<td> ?php echo $edu->getId() ?></td>-->
                                <td nowrap="true"><?php echo $job->getStartDate(); ?></td>
                                <td nowrap="true"><?php echo $job->getEndDate(); ?></td>
                                <td><?php echo $job->getCompanyName(); ?></td>
                                <td><?php echo $job->getAddress(); ?></td>
                                <td><?php echo $job->getPhone(); ?></td>
                                <td><?php echo $job->getJobTitle(); ?></td>
                                <td><?php echo $job->getDuties(); ?></td>
                                <td><?php echo $job->getSupervisor(); ?></td>
                                <td><?php echo $job->getSeparationReason(); ?></td>
                                <td><a class="btn btn-info" href="{{URL::to('/updateEmployment/'.$job->getId())}}">Update</a></td>
                                <td><a class="btn btn-danger" href="{{URL::to('/deleteEmployment/'.$job->getId())}}">Delete</a></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <?php } else { echo "No Employment Found"; } ?>
                        <div class="mt-3">
                            <a class="btn btn-success" href="/addEmploymentForm">Add Employment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection