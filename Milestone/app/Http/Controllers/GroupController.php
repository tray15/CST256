<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Affinity Groups
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The GroupController handles functions
 * specific to creating, joining, leaving, and deleting groups
 * */

namespace App\Http\Controllers;

use App\Models\GroupModel;
use App\Services\Business\CommentService;
use App\Services\Business\GroupsService;
use App\Services\Business\ProfileService;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $groupService;
    private $profileService;
    private $commentService;
    private $logger;

    public function __construct()
    {
        $this->groupService = new GroupsService();
        $this->profileService = new ProfileService();
        $this->commentService = new CommentService();
        $this->logger = new MyLogger();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function displayGroupsPage() {
        $this->logger->info('Entering GroupController.displayGroupsPage()');
        $groupList = $this->groupService->findByProfileId(session('profileid'));
        $joinedGroupList = $this->groupService->findJoinedGroups(session('profileid'));
        $this->logger->info('Exiting GroupController.displayGroupsPage()');
        return view('userGroups', compact('groupList', 'joinedGroupList'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function displayCreateGroupPage() {
        $this->logger->info('Entering GroupController.displayCreateGroupPage()');
        $this->logger->info('Exiting GroupController.displayCreateGroupPage()');
        return view('createGroup');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doCreateGroup(Request $request){
        $this->logger->info('Entering GroupController.doCreateGroup()');
        $profile = $this->profileService->findByUserId(session('userid'));
        $name = $request->name;
        $category = $request->category;
        $description = $request->description;
        $profileId = session('profileid');

        $this->validateCreateGroupForm($request);

        $groupModel = new GroupModel('', $name, $category, $description, $profileId);
        $row = $this->groupService->saveGroup($groupModel);
        $this->logger->info('Exiting GroupController.doCreateGroup()');
        return redirect(route('displayGroupsPage'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function updateGroupForm($id) {
        $this->logger->info('Entering GroupController.updateGroupForm()');
        $group = $this->groupService->findById($id);
        $this->logger->info('Exiting GroupController.updateGroupForm()');
        return view('updateGroupForm')->with('group', $group);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doUpdateGroup(Request $request) {
        $this->logger->info('Entering GroupController.doUpdateGroup()');
        $id = $request->id;
        $name = $request->name;
        $category = $request->category;
        $description = $request->description;
        $profileId = session('profileid');
        $groupModel = new GroupModel($id, $name, $category, $description, $profileId);

        $this->validateCreateGroupForm($request);

        $row = $this->groupService->updateGroup($groupModel);
        $this->logger->info('Exiting GroupController.doUpdateGroup()');
        return redirect(route('displayGroupsPage'));
    }

    /**
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteGroup($id) {
        $this->logger->info('Entering GroupController.deleteGroup()');
        $this->groupService->deleteGroup($id);
        $this->logger->info('Exiting GroupController.deleteGroup()');
        return redirect(route('displayGroupsPage'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function displayFindGroupPage() {
        $this->logger->info('Entering GroupController.displayFindGroupPage()');
        $groups = $this->groupService->findAll();
        $this->logger->info('Exiting GroupController.displayFindGroupPage()');
        return view('findGroup')->with('groups', $groups);
    }

    /**
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function joinGroup($id) {
        $this->logger->info('Entering GroupController.joinGroup()');
        $this->groupService->joinGroup($id);
        $this->logger->info('Exitiing GroupController.joinGroup()');
        return redirect(route('displayGroupsPage'));
    }

    /**
     * @param $group_id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function leaveGroup($group_id) {
        $this->logger->info('Entering GroupController.leaveGroup()');
        $this->groupService->leaveGroup($group_id, session('profileid') );
        $this->logger->info('Exiting GroupController.leaveGroup()');
        return redirect(route('displayGroupsPage'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function displayGroupPage($id) {
        $this->logger->info('Entering GroupController.displayGroupPage()');
        $group = $this->groupService->findById($id);
        $members = $this->groupService->findGroupMembers($group->getId());
        $comments = $this->commentService->findByGroupId($group->getId());
        $memberList = [];
        foreach ($members as $member) {
            $memberList[] = $this->profileService->findById($member->profile_id);
        }
        $this->logger->info('Exiting GroupController.displayGroupPage()');
        return view('groupHomePage', compact('group', 'memberList','comments'));
    }

    /**
     * @param Request $request
     * @return void
     */
    public function validateCreateGroupForm(Request $request) {
        $this->logger->info('Entering GroupController.validateCreateGroupForm()');
        $rules = [
            'name' => 'Required | Between:4,50 | String',
            'category' => 'Required | Between:4,10 | String',
            'description' => 'Required | Between:4,1000 | String'
        ];

        $this->validate($request, $rules);
        $this->logger->info('Exiting GroupController.validateCreateGroupForm()');
    }
}