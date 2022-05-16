<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
	use HasFactory;
    protected $table='petugas';
    protected $primaryKey="id_petugas";
    protected $fillable=[
    	'id_user', /*'username','password',*/	'nama_petugas',	'alamat', 'no_telp'
    ];
    public $timestamps= false;
    
}
