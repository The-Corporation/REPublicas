<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'republic_id',
        'message'
    ];

    protected $dates = ['created_at', 'deleted_at'];

    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
