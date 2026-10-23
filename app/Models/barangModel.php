<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
    protected $table = 'barang';
    
    protected $fillable = [
        'nama_barang',
        'kategori',
        'jenis_id',
        'stok',
    ];

    protected $primaryKey = 'id_barang';

    public function jenis() {
        return $this->belongsTo(jenisModel::class, 'jenis_id', 'id_jenis');
    }

    public function barangMasuk() {
        return $this->hasMany(barangMasukModel::class, 'barang_id', 'id_barang');
    }

    public function barangKeluar() {
        return $this->hasMany(barangKeluarModel::class, 'barang_id', 'id_barang');
    }

    public function penyesuaian() {
        return $this->hasMany(penyesuaianModel::class, 'barang_id', 'id_barang');
    }
}