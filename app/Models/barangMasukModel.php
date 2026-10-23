<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangMasukModel extends Model
{
    protected $table = 'barang_masuk';

    protected $fillable = [
        'barang_id',
        'stok_masuk',
        'tanggal_masuk',
        'user_id',
        'keterangan'
    ];

    protected $primaryKey = 'id_barang_masuk';

    public function barang() {
        return $this->belongsTo(barangModel::class, 'barang_id', 'id_barang');
    }

    public function user() {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
}
