<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //variables

        protected $table = 'rooms';

        protected $fillable = [
            'republic_id',
            'num_beds',
            'type',
            'price'
        ];

        protected $hidden = [];

        protected $with = [];

    // relations

        // one room on one

        /**
         * Belongs to one republic
         * @return [type] [description]
         */
        public function republic()
        {
            return $this->belongsTo( Republic::class );
        }

        // one room to many

        /**
         * Each room has many users
         * @return [type] [description]
         */
        public function users()
        {
            return $this->hasMany( User::class );
        }

    // functions

    // accessors
    public function getTypeAttribute($value)
    {
        return $this->attributes['type'] = ucfirst($value);
    }

    // mutators
}
