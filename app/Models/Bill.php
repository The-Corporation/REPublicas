<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'republic_id',
        'billtype_id',
        'name',
        'value' ,
        'due_date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'due_date',
    ];

    /*
     * Relacionamentos
     */
    public function billType()
    {
        return $this->belongsTo('Republicas\Models\BillType');
    }

    public function republic()
    {
        return $this->belongsTo('Republicas\Models\Republic');
    }
}
