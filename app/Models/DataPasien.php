<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class DataPasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'data_id_user', 'id');
    }

    public function obat(){
        return $this->belongsTo(DataJadwalObat::class, 'id', 'data_id_pasien');
    }

    public function schedule($id){
        return DB::table('schedule_pasiens')
        ->selectRaw('*')
        ->where('data_id_pasien', '=', $id)
        ->get();
    }

    public function obatTest($id){
        return DB::table('data_jadwal_obats')
        ->selectRaw('*')
        ->where('data_id_pasien', '=', $id)
        ->get();
    }

    public function obatHabis($id){
        return DB::table('data_jadwal_obats')
        ->selectRaw('*')
        ->where('data_id_pasien', '=', $id)
        ->where('jumlah_obat', '<=', '5')
        ->get();
    }

    public function labTest($id){
        return DB::table('data_labs')
        ->selectRaw('*')
        ->where('data_id_pasien', '=', $id)
        ->get();
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function cigarettes($cigarettes){
        if($cigarettes =='Yes'){
            return '<i class="bi bi-check-square"></i>';
        }elseif($cigarettes =='No'){
            return '<i class="bi bi-square"></i>';
        }
    }

}
