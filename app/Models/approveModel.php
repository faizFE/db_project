<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class approveModel extends Model
{
    protected $table = 'approve';

    protected $fillable = [
        'user_id',
        'status',
        'approved_by',
        'processed_at',
    ];

    protected function casts(): array
    {
        return [
            'processed_at' => 'datetime',
        ];
    }

    public function user() {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function approve() {
        return $this->belongsTo(user::class, 'approved_by');
    }
}
