<?php

namespace Republicas\Models;
use \Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //use LocalizedEloquentTrait;

    protected $fillable = [
        'republic_id',
        'user_id',
        'title',
        'message'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
