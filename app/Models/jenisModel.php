<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jenisModel extends Model
{
    protected $table = 'jenis';

    protected $fillable = [
        'nama_jenis'
    ];

    protected $primaryKey = 'id_jenis';

    public function barang(){
        return $this->hasMany(barangModel::class, 'jenis_id', 'id_jenis');
    }
}
