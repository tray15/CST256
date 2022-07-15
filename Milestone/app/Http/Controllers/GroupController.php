<?php

namespace App\Http\Controllers;

use App\Models\GroupModel;
use App\Services\Business\CommentService;
use App\Services\Business\GroupsService;
use App\Services\Business\ProfileService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $groupService;
    private $profileService;
    private $commentService;

    public function __construct()
    {
        $this->groupService = new GroupsService();
        $this->profileService = new ProfileService();
        $this->commentService = new CommentService();
    }

    public function displayGroupsPage() {
        $groupList = $this->groupService->findByProfileId(session('profileid'));
        $joinedGroupList = $this->groupService->findJoinedGroups(session('profileid'));

        return view('userGroups', compact('groupList', 'joinedGroupList'));
    }

    public function displayCreateGroupPage() {
        return view('createGroup');
    }

    public function doCreateGroup(Request $request){
        $profile = $this->profileService->findByUserId(session('userid'));
        $name = $request->name;
        $category = $request->category;
        $description = $request->description;
        $profileId = session('profileid');

        $this->validateCreateGroupForm($request);

        $groupModel = new GroupModel('', $name, $category, $description, $profileId);
        $row = $this->groupService->saveGroup($groupModel);

        return redirect(route('displayGroupsPage'));
    }

    public function updateGroupForm($id) {
        $group = $this->groupService->findById($id);
        return view('updateGroupForm')->with('group', $group);
    }

    public function doUpdateGroup(Request $request) {

        $id = $request->id;
        $name = $request->name;
        $category = $request->category;
        $description = $request->description;
        $profileId = session('profileid');
        $groupModel = new GroupModel($id, $name, $category, $description, $profileId);
        $row = $this->groupService->updateGroup($groupModel);

        return redirect(route('displayGroupsPage'));
    }

    public function deleteGroup($id) {
        $this->groupService->deleteGroup($id);
        return redirect(route('displayGroupsPage'));
    }

    public function displayFindGroupPage() {
        $groups = $this->groupService->findAll();
        return view('findGroup')->with('groups', $groups);
    }

    public function joinGroup($id) {
        $this->groupService->joinGroup($id);
        return redirect(route('displayGroupsPage'));
    }

    public function leaveGroup($group_id) {
        $this->groupService->leaveGroup($group_id, session('profileid') );
        return redirect(route('displayGroupsPage'));
    }

    public function displayGroupPage($id) {
        $group = $this->groupService->findById($id);
        $members = $this->groupService->findGroupMembers($group->getId());
        $comments = $this->commentService->findByGroupId($group->getId());
        $memberList = [];
        foreach ($members as $member) {
            $memberList[] = $this->profileService->findById($member->profile_id);
        }
        return view('groupHomePage', compact('group', 'memberList','comments'));
    }

    public function validateCreateGroupForm(Request $request) {
        $rules = [
            'name' => 'Required | Between:4,50 | String',
            'category' => 'Required | Between:4,10 | String',
            'description' => 'Required | Between:4,1000 | String'
        ];

        $this->validate($request, $rules);
    }
}