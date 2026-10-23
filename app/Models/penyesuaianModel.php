<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penyesuaianModel extends Model
{
    protected $table = "penyesuaian";

    protected $fillable = [
        'barang_id',
        'penyesuaian',
        'stok_penyesuaian',
        'tanggal_penyesuaian',
        'user_id',
        'alasan'
    ];

    protected $primaryKey = 'id_penyesuaian';

    public function barang(){
        return $this->belongsTo(barangModel::class, 'barang_id', 'id_barang');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
