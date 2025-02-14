<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
        public function user()
        {
            return $this->HasMany('App\PesananDetail','id_barang', 'id');
        }
        public function pesanan()
        {
            return $this->belongsTo('App\Pesanan','id_pesanan', 'id');
        }
        
        public function barang()
        {
            return $this->belongsTo(Barang::class, 'id_barang');
        }
}

