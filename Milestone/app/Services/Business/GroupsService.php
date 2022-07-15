<?php

namespace App\Services\Business;

use App\Models\GroupModel;
use App\Models\MembershipModel;
use App\Services\Data\GroupsDAO;
use http\Env\Request;

class GroupsService
{
    private $groupDAO;

    function __construct(){
        $this->groupDAO = new GroupsDAO();
    }

    public function findAll(): array
    {
        $groups = $this->groupDAO->findAll();
        $groupList = [];
        foreach ($groups as $group) {
            $groupModel = new GroupModel(
                $group->id,
                $group->name,
                $group->category,
                $group->description,
                $group->profile_id
            );
            $groupList[] = $groupModel;
        }
        return $groupList;
    }

    public function saveGroup(GroupModel $groupModel)
    {
        return $this->groupDAO->saveGroup($groupModel);
    }

    public function findByProfileId($id): array
    {
        $groups = $this->groupDAO->findByProfileId($id);
        $groupList = [];
        foreach ($groups as $group) {
            $groupModel = new GroupModel(
                $group->id,
                $group->name,
                $group->category,
                $group->description,
                $group->profile_id
            );
            $groupList[] = $groupModel;
        }
        return $groupList;
    }

    public function findById($id)
    {
        $record = $this->groupDAO->findById($id);
        $group = new GroupModel(
          $record->id,
          $record->name,
          $record->category,
          $record->description,
          $record->profile_id
        );
        return $group;
    }

    public function updateGroup(GroupModel $groupModel)
    {
        return $this->groupDAO->updateGroup($groupModel);
    }

    public function deleteGroup($id)
    {
        return $this->groupDAO->deleteGroup($id);
    }

    public function joinGroup($id)
    {
        $alreadyJoined = $this->groupDAO->checkIfAlreadyJoined($id, session('profileid'));

        if ($alreadyJoined) {
            return null;
        }
        return $this->groupDAO->joinGroup($id);
    }

    public function findJoinedGroups($id): array
    {
        $memberships = $this->groupDAO->findJoinedGroups($id);
        $joinedGroups = [];
        foreach ($memberships as $membership) {
            $groupModel = new GroupModel(
                $membership->id,
                $membership->name,
                $membership->category,
                $membership->description,
                $membership->profile_id
            );
            $joinedGroups[] = $groupModel;
        }
        return $joinedGroups;
    }

    public function leaveGroup($group_id, $profile_id)
    {
        return $this->groupDAO->leaveGroup($group_id, $profile_id);
    }

    public function findGroupMembers($id)
    {
        return $members = $this->groupDAO->findGroupMembers($id);
    }
}