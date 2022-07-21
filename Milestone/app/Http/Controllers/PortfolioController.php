<?php
namespace App\Http\Controllers;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use App\Services\Business\EducationService;
use App\Services\Business\EmploymentService;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private $logger;

    function __construct() {
        $this->logger = new MyLogger();
    }

    public function displayPortfolioPage()
    {
        $this->logger->info('Entering PortfolioController.displayPortfolioPage()');
        $eduService = new EducationService();
        $jobService = new EmploymentService();
        $userid = session('userid');
        $educationRecords = $eduService->findByUserId($userid);
        $jobRecords = $jobService->findAllByUserId($userid);
        $this->logger->info('Exiting PortfolioController.displayPortfolioPage()');
        return view('createPortfolio')->with([
            'records' => $educationRecords,
            'jobRecords' => $jobRecords
        ]);
    }

    public function saveEducation(Request $request)
    {
        $this->logger->info('Entering PortfolioController.saveEducation()');
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
        $this->logger->info('Exiting PortfolioController.saveEducation()');
        return redirect()->route('displayPortfolioPage');
    }

    public function updateEducationForm($id)
    {
        $this->logger->info('Entering PortfolioController.updateEducationForm()');
        $service = new EducationService();
        $educationRecord = $service->findById($id);
        $this->logger->info('Exiting PortfolioController.updateEducationForm()');
        return view('updateEducationForm')->with('record', $educationRecord);
    }

    public function doUpdateEducation(Request $request)
    {
        $this->logger->info('Entering PortfolioController.doUpdateEducation()');
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
        $this->logger->info('Exiting PortfolioController.doUpdateEducation()');
        return redirect()->route('displayPortfolioPage');
    }

    public function deleteEducation(int $id)
    {
        $this->logger->info('Entering PortfolioController.deleteEducation()');
        $service = new EducationService();
        $service->deleteEducation($id);
        $this->logger->info('Exiting PortfolioController.deleteEducation()');
        return redirect()->route('displayPortfolioPage');
    }

    public function saveEmployment(Request $request)
    {
        $this->logger->info('Entering PortfolioController.saveEmployment()');
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
        $this->logger->info('Exiting PortfolioController.saveEmployment()');
        return redirect()->route('displayPortfolioPage');
    }

    public function updateEmploymentForm($id)
    {
        $this->logger->info('Entering PortfolioController.updateEmploymentForm()');
        $service = new EmploymentService();
        $jobRecord = $service->findById($id);
        $this->logger->info('Exiting PortfolioController.updateEmploymentForm()');
        return view('updateEmploymentForm')->with('record', $jobRecord);
    }

    public function doUpdateEmployment(Request $request)
    {
        $this->logger->info('Entering PortfolioController.doUpdateEmployment()');
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
        $empService->updateEmployment($job);
        $this->logger->info('Exiting PortfolioController.doUpdateEmployment()');
        return redirect()->route('displayPortfolioPage');
    }

    public function deleteEmployment($id)
    {
        $this->logger->info('Entering PortfolioController.deleteEmployment()');
        $service = new EmploymentService();
        $service->deleteEmployment($id);
        $this->logger->info('Exiting PortfolioController.deleteEmployment()');
        return redirect()->route('displayPortfolioPage');
    }

    private function validateSchoolForm(Request $request)
    {
        $this->logger->info('Entering PortfolioController.validateSchoolForm()');
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
        $this->logger->info('Exiting PortfolioController.validateSchoolForm()');
    }

    private function validateEmploymentForm(Request $request)
    {
        $this->logger->info('Entering PortfolioController.validateEmploymentForm()');
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
        $this->logger->info('Exiting PortfolioController.validateEmploymentForm()');
    }
}