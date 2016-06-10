<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;

class BillType extends Model
{
    protected $table = 'billtypes';

    protected $fillable = [
        'republic_id',
        'name',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }
}
