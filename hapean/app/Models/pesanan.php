<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans'; 
    
    protected $fillable = [
        'user_id',
        'tanggal',
        'jumlah_harga',
        'kode',
        'bukti_transfer' 
    ];

   
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    
    public function pesanan_details()
    {
        return $this->hasMany('App\Models\Pesanan_Detail', 'id_pesanan', 'id');
    }
}
