<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kodeine\Acl\Models\Eloquent\Role;

class GroupController extends Controller
{
    public function showGroups() {
        return view('forum.admin.board.groups', [
            'objRoles' => Role::all()
        ]);
    }

    public function removeGroup(Request $objRequest, $iGroupID) {
        $objGroup = Group::where('id', $iGroupID)->first();

        if($objGroup)
            $objGroup->delete();

        return redirect()->route('forum.admin.board.groups');
    }

    public function toggleEnabled(Request $objRequest, $iGroupID) {
        $objGroup = Group::where('id', $iGroupID)->first();

        if($objGroup) {
            $objGroup->enabled = !$objGroup->enabled;
            $objGroup->save();
        }

        return redirect()->route('forum.admin.board.groups');
    }

    public function addGroup(Request $objRequest) {
        $strGroupName = $objRequest->input('group_name');
        $iInheritsFrom = $objRequest->input('group_inherits_from') ? intval($objRequest->input('group_inherits_from')) : null;

        $objGroup = Group::where('name', $strGroupName)->first();
        if($iInheritsFrom)
            $objInheritedGroup = Group::where('id', $iInheritsFrom)->first();

        if($objGroup)
            dd("GROUP EXISTS");

        return redirect()->route('forum.admin.board.groups');
    }
}
