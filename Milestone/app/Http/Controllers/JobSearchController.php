<?php

namespace App\Http\Controllers;

use App\Services\Business\JobPostService;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new JobPostService();
    }

    public function index(){
        $jobposts = $this->service->findAll();

        return view('jobsearch')->with('jobs', $jobposts);
    }

    public function search(Request $request) {
        $searchTerm = $request->searchTerm;
        $jobposts = $this->service->search($searchTerm);

        return view('jobsearch')->with('jobs', $jobposts);
    }

    public function jobDetails($id) {
        $jobPost = $this->service->findById($id);

        return view('jobDetails')->with('jobPost', $jobPost);
    }

    public function apply($id) {
        $jobPost = $this->service->findById($id);

        return view('searchResults')->with('jobPost', $jobPost);
    }
}
