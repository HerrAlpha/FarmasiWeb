<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLab extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function datalab(){
        return $this->belongsTo(DataPasien::class, 'data_id_pasien', 'id');
    }

    public function klasifikasi($td_tds, $td_tdd){
        if($td_tds < 120 && $td_tdd < 80){
            return $klasifikasi = "Normal";
        }elseif($td_tds >= 120 && $td_tds <= 139 && $td_tdd >= 80 && $td_tdd <= 89){
            return $klasifikasi = "Pra-Hipertensi";
        }elseif($td_tds >= 140 && $td_tds <= 159 && $td_tdd >= 90 && $td_tdd <= 99){
            return $klasifikasi = "Hipertensi Tingkat 1";
        }elseif($td_tds > 160 && $td_tdd > 100){
            return $klasifikasi = "Hipertensi Tingkat 2";
        }elseif($td_tds > 140 &&  $td_tdd < 90){
            return $klasifikasi = "Hipertensi Sistolik Terisolasi";
        }else{
            return $klasifikasi = "Belum Terdefinisi";
        }
    }

    public function classification($klasifikasi){
        if($klasifikasi =='Normal'){
            return '<div class="u-j">
                        <span class="u-normal">Normal</span>
                    </div>';
        }elseif($klasifikasi =='Pra-Hipertensi'){
            return '<div class="u-j">
                        <span class="u-praH">Pra-Hipertensi</span>
                    </div>';
        }elseif($klasifikasi =='Hipertensi Tingkat 1'){
            return '<div class="u-j">
                        <span class="u-HT1">Hipertensi Tingkat 1</span>
                    </div>';
        }elseif($klasifikasi =='Hipertensi Tingkat 2'){
            return '<div class="u-j">
                        <span class="u-HT2">Hipertensi Tingkat 2</span>
                    </div>';
        }elseif($klasifikasi =='Hipertensi Sistolik Terisolasi'){
            return '<div class="u-j">
                        <span class="u-HST">Hipertensi Sistolik Terisolasi</span>
                    </div>';
        }elseif($klasifikasi =='Belum Terdefinisi'){
            return '<div>
                        <span>Belum Terdefinisi</span>
                    </div>';
        }
    }
}
