<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangKeluarModel extends Model
{
     protected $table = 'barang_keluar';

    protected $fillable = [
        'barang_id',
        'stok_keluar',
        'tanggal_keluar',
        'user_id',
        'keterangan'
    ];

    protected $primaryKey = 'id_barang_keluar';

    public function barang() {
        return $this->belongsTo(barangModel::class, 'barang_id', 'id_barang');
    }

    public function user() {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
}
