<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;

class Republic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'republics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'telephone',
        'address',
        'city',
        'state',
        'number_room',
        'room_detail',
        'vacancy'
    ];

    /*
     * Relationships
     */
    public function users()
    {
        return $this->belongsToMany('Republicas\Models\User');
    }

    public function responsible()
    {
        return $this->belongsTo('Republicas\Models\User', 'user_id');
    }
}
