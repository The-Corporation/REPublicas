<?php

namespace Republicas\Models;

use Carbon\Carbon;
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

    public function bills()
    {
        return $this->hasMany('Republicas\Models\Bill');
    }

    public function getBillTotal()
    {
        $total = 0.0;
        foreach($this->bills as $bill) {
            $total += $bill->value;
        }

        return $total;
    }

    public function getCurrentMonth()
    {
        $date = Carbon::now()->month;

        switch($date)
        {
            case 1:
                return 'Janeiro';
            case 2:
                return 'Fevereiro';
            case 3:
                return 'Março';
            case 4:
                return 'Abril';
            case 5:
                return 'Maio';
            case 6:
                return 'Junho';
            case 7:
                return 'Julho';
            case 8:
                return 'Agosto';
            case 9:
                return 'Setembro';
            case 10:
                return 'Outubro';
            case 11:
                return 'Novembro';
            case 12:
                return 'Dezembro';

        }
    }
}
