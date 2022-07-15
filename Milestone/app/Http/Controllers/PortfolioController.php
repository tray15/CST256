<?php
namespace App\Http\Controllers;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use App\Services\Business\EducationService;
use App\Services\Business\EmploymentService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function displayPortfolioPage()
    {
        $eduService = new EducationService();
        $jobService = new EmploymentService();
        $userid = session('userid');
        $educationRecords = $eduService->findByUserId($userid);
        $jobRecords = $jobService->findAllByUserId($userid);
        return view('createPortfolio')->with([
            'records' => $educationRecords,
            'jobRecords' => $jobRecords
        ]);
    }

    public function saveEducation(Request $request)
    {
        $eduService = new EducationService();
        $userid = session('userid');
        $id = "";
        $school = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $degree = $request->get('degree');
        $start = $request->get('start_date');
        $end = $request->get('end_date');

        $this->validateSchoolForm($request);

        $edu = new EducationModel($id, $school, $address, $phone, $degree, $start, $end, $userid);
        $row = $eduService->saveEducation($edu);
        return redirect()->route('displayPortfolioPage');
    }

    public function updateEducationForm($id)
    {
        $service = new EducationService();
        $educationRecord = $service->findById($id);
        return view('updateEducationForm')->with('record', $educationRecord);
    }

    public function doUpdateEducation(Request $request)
    {
        $eduService = new EducationService();
        $id = $request->get('id');
        $school = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $degree = $request->get('degree');
        $start = $request->get('start_date');
        $end = $request->get('end_date');

        $this->validateSchoolForm($request);

        $edu = new EducationModel($id, $school, $address, $phone, $degree, $start, $end, session('userid'));
        $row = $eduService->updateEducation($edu);

        return redirect()->route('displayPortfolioPage');
    }

    public function deleteEducation(int $id)
    {
        $service = new EducationService();
        $service->deleteEducation($id);
        return redirect()->route('displayPortfolioPage');
    }

    public function saveEmployment(Request $request)
    {
        $empService = new EmploymentService();
        $id = $request->get('id');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $company_name = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $job_title = $request->get('title');
        $duties = $request->get('duties');
        $supervisor = $request->get('supervisor');
        $separation_reason = $request->get('separation');
        $user_id = session('userid');

        $this->validateEmploymentForm($request);

        $job = new EmploymentModel($id, $company_name, $address, $phone, $job_title, $duties, $supervisor, $separation_reason, $start_date, $end_date, $user_id);
        $empService->saveEmployment($job);
        return redirect()->route('displayPortfolioPage');
    }

    public function updateEmploymentForm($id)
    {
        $service = new EmploymentService();
        $jobRecord = $service->findById($id);
        return view('updateEmploymentForm')->with('record', $jobRecord);
    }

    public function doUpdateEmployment(Request $request)
    {
        $empService = new EmploymentService();
        $id = $request->get('id');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $company_name = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $job_title = $request->get('title');
        $duties = $request->get('duties');
        $supervisor = $request->get('supervisor');
        $separation_reason = $request->get('separation');
        $user_id = session('userid');

        $job = new EmploymentModel($id, $company_name, $address, $phone, $job_title, $duties, $supervisor, $separation_reason, $start_date, $end_date, $user_id);
        $empService->updateEmployment($job);
        return redirect()->route('displayPortfolioPage');
    }

    public function deleteEmployment($id)
    {
        $service = new EmploymentService();
        $service->deleteEmployment($id);
        return redirect()->route('displayPortfolioPage');
    }

    private function validateSchoolForm(Request $request)
    {
        // Setup Data Validation Rules for Create Profile Form
        $rules = [
            'start_date' => 'Required',
            'end_date' => 'Required',
            'name' => 'Required | Between:4,100 | String',
            'address' => 'Required | Between:4,100 | String',
            'phone' => 'Required | regex:/^(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'degree' => 'Required | Between:4,50 | String'
        ];

        // Run Data Validation Rules
        $this->validate($request, $rules);
    }

    private function validateEmploymentForm(Request $request)
    {
        // Set up Data Validation for addEmployment Form
        $rules = [
            'start_date' => 'Required',
            'end_date' => 'Required',
            'name' => 'Required | Between:4,100 | String',
            'address' => 'Required | Between:4,100 | String',
            'phone' => 'Required | regex:/^(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'title' => 'Required | Between:4,50 | String',
            'duties' => 'Required | Between:4,1000 | String',
            'supervisor' => 'Required | Between:4,100 | String',
            'separation' => 'Required | Between:4,100 | String',
        ];

        // Run Data Validation Rules
        $this->validate($request, $rules);
    }
}