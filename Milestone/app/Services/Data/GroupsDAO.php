<?php

namespace App\Services\Data;

use App\Models\GroupModel;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Not;
use mysql_xdevapi\Session;

class GroupsDAO
{
    public function findAll(){
        return DB::table('groups')
            ->where('profile_id', '!=', session('profileid'))->get();
    }

    public function saveGroup(GroupModel $groupModel)
    {
        return DB::table('groups')->insertGetId([
            'name'=> $groupModel->getName(),
            'category' => $groupModel->getCategory(),
            'description' => $groupModel->getDescription(),
            'profile_id' => $groupModel->getProfileId()
        ]);
    }

    public function findByProfileId($id)
    {
        return DB::table('groups')->where('profile_id', $id)->get();
    }

    public function findById($id)
    {
        return DB::table('groups')->where('id', $id)->first();
    }

    public function updateGroup(GroupModel $groupModel)
    {
        return DB::table('groups')->where('id', $groupModel->getId())->update([
            'name'=> $groupModel->getName(),
            'category' => $groupModel->getCategory(),
            'description' => $groupModel->getDescription(),
            'profile_id' => $groupModel->getProfileId()
        ]);
    }

    public function deleteGroup($id)
    {
        return DB::table('groups')->delete($id);
    }

    public function joinGroup($id)
    {
        return DB::table('group_membership')->insertGetId([
            'group_id'=>$id,
            'profile_id'=>session('profileid')
        ]);
    }

    public function findJoinedGroups($session)
    {
        $membershipList = DB::table('groups')
            ->join('group_membership', 'groups.id', '=', 'group_membership.group_id')
            ->select('groups.id', 'groups.name', 'groups.category', 'groups.description', 'groups.profile_id')
            ->where('group_membership.profile_id', $session)
            ->where('groups.profile_id', '!=', $session)
            ->distinct()->get();
        return $membershipList;
    }

    public function checkIfAlreadyJoined($id, $session)
    {
        return DB::table('group_membership')->where([
            ['group_id', '=', $id],
            ['profile_id', '=', $session],
        ])->first();
    }

    public function leaveGroup($group_id, $profile_id)
    {
        $row = DB::table('group_membership')
            ->where('group_id', $group_id)
            ->where('profile_id', $profile_id)->first();
        return DB::table('group_membership')->delete($row->id);
    }

    public function findGroupMembers($id)
    {
        return DB::table('group_membership')->where('group_id', $id)->select('profile_id')->get();
    }
}