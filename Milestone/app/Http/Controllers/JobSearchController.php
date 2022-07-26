<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Job Match
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The JobSearchController handles functions
 * specific to searching for and applying to jobs
 * */
namespace App\Http\Controllers;

use App\Services\Business\JobPostService;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    private $service;
    private $logger;

    function __construct()
    {
        $this->service = new JobPostService();
        $this->logger = new MyLogger();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index(){
        $this->logger->info('Entering JobSearchController.index()');
        $jobposts = $this->service->findAll();
        $this->logger->info('Exiting JobSearchController.index()');
        return view('jobsearch')->with('jobs', $jobposts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function search(Request $request) {
        $this->logger->info('Entering JobSearchController.search()');
        $searchTerm = $request->searchTerm;
        $jobposts = $this->service->search($searchTerm);
        $this->logger->info('Exiting JobSearchController.search()');
        return view('jobsearch')->with('jobs', $jobposts);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function jobDetails($id) {
        $this->logger->info('Entering JobSearchController.jobDetails()');
        $jobPost = $this->service->findById($id);
        $this->logger->info('Exiting JobSearchController.jobDetails()');
        return view('jobDetails')->with('jobPost', $jobPost);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function apply($id) {
        $this->logger->info('Entering JobSearchController.apply()');
        $jobPost = $this->service->findById($id);
        $this->logger->info('Exiting JobSearchController.apply()');
        return view('applySuccess')->with('jobPost', $jobPost);
    }
}
