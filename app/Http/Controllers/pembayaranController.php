<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Validator;

class pembayaranController extends Controller
{
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'id_petugas' => 'required',
            'nisn' => 'required',
            'tgl_bayar'=>'required|date',
            'bulan_spp'=>'required|numeric',
            'tahun_spp'=>'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $pembayaran = Pembayaran::create([
        	'id_petugas'=>$request->get('id_petugas'),
        	'nisn'=>$request->get('nisn'),
        	'tgl_bayar'=>$request->get('tgl_bayar'),
            'bulan_spp'=>$request->get('bulan_spp'),
            'tahun_spp'=>$request->get('tahun_spp'),
        ]);
        if($pembayaran){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(), [
            'id_petugas' => 'required',
            'nisn' => 'required',
            'tgl_bayar'=>'required|date',
            'bulan_spp'=>'required|numeric',
            'tahun_spp'=>'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $pembayaran = Pembayaran::where('id_pembayaran',$id)->update([
        	'id_petugas'=>$request->get('id_petugas'),
        	'nisn'=>$request->get('nisn'),
        	'tgl_bayar'=>$request->get('tgl_bayar'),
            'bulan_spp'=>$request->get('bulan_spp'),
            'tahun_spp'=>$request->get('tahun_spp'),
        ]);
        if($pembayaran){
        	return response()->json(['status'=> 'pembayaran berhasil']);
        } else {
        	return response()->json(['status'=> 'pembayaran gagal']);
        }
    }
    public function delete($id)
    {
    	$pembayaran = Pembayaran::where('id_pembayaran',$id)->delete();
        if($pembayaran){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
}
