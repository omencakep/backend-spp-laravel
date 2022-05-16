<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class siswa2Controller extends Controller
{

    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(), [
            'nisn'=>'required|string|max:255|unique:siswa',
        	'nis'=>'required|string|max:255',
            'nama' => 'required|string|max:255',
            'id_kelas'=>'required',
            'email' => 'required|string|max:255|unique:siswa',
            'password' => 'required|string|min:6|confirmed',
            'alamat'=>'required|string',
            'no_telp'=>'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $siswa = Siswa::where('nisn',$id)->update([
            'nisn'=>$request->get('nisn'),
        	'nis'=>$request->get('nis'),
        	'nama'=>$request->get('nama'),
            'id_kelas'=>$request->get('id_kelas'),
        	'email'=>$request->get('email'),
        	'password'=>Hash::make($request->get('password')),
            'alamat'=>$request->get('alamat'),
        	'no_telp'=>$request->get('no_telp'),
        ]);
        if($siswa){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }

    public function delete($id)
    {
    	$siswa = Siswa::where('nisn',$id)->delete();
        if($siswa){
        	return response()->json(['status'=>true]);
        } else {
        	return response()->json(['status'=>false]);
        }
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }
    public function getprofile()
    {
    	return response()->json(['data'=>JWTAuth::user()]);
    }

}
