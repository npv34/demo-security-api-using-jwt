<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getAll()
    {
        $groups = Group::all();
        $data = [
            'status' => 'cusses',
            'data' => $groups
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $group = new Group();
        $group->name = $request->name;
        $group->save();

        $data = [
            'status' => 'success',
            'message' => 'create group success'
        ];
        return response()->json($data);
    }

    public function delete($id)
    {
        $group = Group::find($id);
        if (!$group) {
            $data = [
                'status' => 'error',
                'message' => 'group not found'
            ];

        } else {
            $group->delete();
            $data = [
                'status' => 'success',
                'message' => 'delete group success'
            ];
        }

        return response()->json($data);

    }

    public function getById($id) {
        $group = Group::find($id);
        if (!$group) {
            $data = [
                'status' => 'error',
                'message' => 'group not found'
            ];

        } else {
            $data = [
                'status' => 'success',
                'data' => $group
            ];
        }

        return response()->json($data);
    }
}
