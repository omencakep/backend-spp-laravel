<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use Illuminate\Support\Facades\Validator;

class sppController extends Controller
{
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'angkatan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'nominal'=>'required|string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $spp = Spp::create([
        	'angkatan'=>$request->get('angkatan'),
        	'tahun'=>$request->get('tahun'),
        	'nominal'=>$request->get('nominal'),
        ]);
        if($spp){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(), [
            'angkatan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'nominal'=>'required|string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $spp = Spp::where('id_spp',$id)->update([
        	'angkatan'=>$request->get('angkatan'),
        	'tahun'=>$request->get('tahun'),
        	'nominal'=>$request->get('nominal'),
        ]);
        if($spp){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function delete($id)
    {
    	$spp = Spp::where('id_spp',$id)->delete();
        if($spp){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
}
