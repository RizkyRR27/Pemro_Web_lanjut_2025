<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return UserModel::all();
    }
    public function store(Request $request){
        $user = userModel::create($request->all());
        return response()->json($user, 201);
    }

    public function show(userModel $user){
        return userModel::find($user);
    }

    public function update(Request $request, userModel $user){
        $user->update($request->all());
        return userModel::find($user);
    }

    public function destroy(userModel $user){
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
