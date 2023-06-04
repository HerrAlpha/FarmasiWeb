<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMinumObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_id_pasien',
        'data_id_jadwal_obat',
        'status_minum',
        'keterangan'
    ];
}
