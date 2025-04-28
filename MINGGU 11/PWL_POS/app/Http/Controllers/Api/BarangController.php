<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5',
            'level_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = BarangModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $request->image,
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }

    public function index(){
        return BarangModel::all();
    }
    public function store(Request $request){
        $barang = BarangModel::create($request->all());
        return response()->json($barang, 201);
    }

    public function show(BarangModel $barang){
        return BarangModel::find($barang);
    }

    public function update(Request $request, BarangModel $barang){
        $barang->update($request->all());
        return BarangModel::find($barang);
    }

    public function destroy(BarangModel $user){
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
