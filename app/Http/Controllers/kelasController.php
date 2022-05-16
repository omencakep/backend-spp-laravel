<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class kelasController extends Controller
{

    public function show(){
        return Kelas::all();
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan'=>'required|string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $kelas = Kelas::create([
        	'nama_kelas'=>$request->get('nama_kelas'),
        	'jurusan'=>$request->get('jurusan'),
        	'angkatan'=>$request->get('angkatan'),
        ]);
        if($kelas){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan'=>'required|string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $kelas = Kelas::where('id_kelas',$id)->update([
        	'nama_kelas'=>$request->get('nama_kelas'),
        	'jurusan'=>$request->get('jurusan'),
        	'angkatan'=>$request->get('angkatan'),
        ]);
        if($kelas){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function delete($id)
    {
    	$kelas = Kelas::where('id_kelas',$id)->delete();
        if($kelas){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
}
