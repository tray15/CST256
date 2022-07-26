<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Affinity Groups
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The GroupsDAO handles the
 * database interaction for Groups
 * */
namespace App\Services\Data;

use App\Models\GroupModel;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Not;
use mysql_xdevapi\Session;

class GroupsDAO
{
    /**
     * @return mixed
     */
    public function findAll(){
        return DB::table('groups')
            ->where('profile_id', '!=', session('profileid'))->get();
    }

    /**
     * @param GroupModel $groupModel
     * @return mixed
     */
    public function saveGroup(GroupModel $groupModel)
    {
        return DB::table('groups')->insertGetId([
            'name'=> $groupModel->getName(),
            'category' => $groupModel->getCategory(),
            'description' => $groupModel->getDescription(),
            'profile_id' => $groupModel->getProfileId()
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByProfileId($id)
    {
        return DB::table('groups')->where('profile_id', $id)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return DB::table('groups')->where('id', $id)->first();
    }

    /**
     * @param GroupModel $groupModel
     * @return mixed
     */
    public function updateGroup(GroupModel $groupModel)
    {
        return DB::table('groups')->where('id', $groupModel->getId())->update([
            'name'=> $groupModel->getName(),
            'category' => $groupModel->getCategory(),
            'description' => $groupModel->getDescription(),
            'profile_id' => $groupModel->getProfileId()
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteGroup($id)
    {
        return DB::table('groups')->delete($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function joinGroup($id)
    {
        return DB::table('group_membership')->insertGetId([
            'group_id'=>$id,
            'profile_id'=>session('profileid')
        ]);
    }

    /**
     * @param $session
     * @return mixed
     */
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

    /**
     * @param $id
     * @param $session
     * @return mixed
     */
    public function checkIfAlreadyJoined($id, $session)
    {
        return DB::table('group_membership')->where([
            ['group_id', '=', $id],
            ['profile_id', '=', $session],
        ])->first();
    }

    /**
     * @param $group_id
     * @param $profile_id
     * @return mixed
     */
    public function leaveGroup($group_id, $profile_id)
    {
        $row = DB::table('group_membership')
            ->where('group_id', $group_id)
            ->where('profile_id', $profile_id)->first();
        return DB::table('group_membership')->delete($row->id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findGroupMembers($id)
    {
        return DB::table('group_membership')->where('group_id', $id)->select('profile_id')->get();
    }
}