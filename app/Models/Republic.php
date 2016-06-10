<?php

namespace Republicas\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class Republic extends Model
{
    use Metable;

    /**
     * Meta Table
     */
    protected $metaTable = 'republics_meta';

    /**
     * The database table used by the model.
     */
    protected $table = 'republics';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'telephone',
        'address',
        'city',
        'state',
        'simple_rooms',
        'suite_rooms',
        'vacancy'
    ];

    /**
     * Adding Accessors to the JSON
     */
    protected $appends = [
        'number_rooms',
    ];


    //******************************** Relationships *********************************
    public function users()
    {
        return $this->belongsToMany(User::class, 'republic_users');
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }
    //****************************************************************************************

    //***************************************** Accessors ************************************
    /**
     * Gets the number of rooms.
     *
     * @return   integer  The number of rooms attribute.
     */
    public function getNumberRoomsAttribute()
    {
        return $this->simple_rooms + $this->suite_rooms;
    }
    //******************************************************************************************
    /**
     * Gets the total sum of bills.
     *
     * @return     float  The bill total.
     */
    public function getBillTotal()
    {
        $total = 0.0;
        foreach($this->bills as $bill) {
            $date = $bill->due_date;
            if($date->month == Carbon::now()->month)
                $total += $bill->value;
        }

        return $total;
    }

    /**
     * Gets the current month.
     *
     * @return     string  The current month.
     */
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
