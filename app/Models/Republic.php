<?php

namespace Republicas\Models;

use Carbon\Carbon;
use Kodeine\Metable\Metable;
use Republicas\Models\BillType;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(User::class, 'republic_users')->withTimestamps();
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function billtypes()
    {
        return $this->hasMany(BillType::class);
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    public function rooms()
    {
        return $this->hasMany( Room::class );
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
        $bills_total = 0.0;
        $rent = $this->getRent();

        foreach($this->bills as $bill) {
            $date = $bill->due_date;
            if($date->month == Carbon::now()->month && $date->year == Carbon::now()->year)
                $bills_total += $bill->value;
        }

        return $bills_total + $rent;
    }

    /**
     * Gets the rent.
     *
     * @return     float  The rent.
     */
    public function getRent()
    {
        $rent = 0.0;

        foreach ($this->rooms as $key => $room) {
            $rent += $room->price;
        }

        return $rent;
    }

    /**
     * Gets the bills by type.
     *
     * @param      <type>  $type   The type
     * @return     array   The bills by type.
     */
    public function  getBillsByType($typeId)
    {
        $bills = [];

        foreach ($this->bills->sortBy('due_date') as $key => $bill) {
            if($bill->getByType($typeId))
                $bills[$bill->id] = floatval($bill->getByType($typeId)->value);
        }

        return $bills;
    }

    public function getBillsCurrentMonthByType($typeId)
    {
        $bills = 0;

        foreach ($this->bills as $key => $bill) {
            if($bill->getByType($typeId) && ($bill->due_date->month == Carbon::now()->month && $bill->due_date->year == Carbon::now()->year)) {
                $bills = floatval($bill->getByType($typeId)->value);
            }
        }

        return $bills;
    }

    public function getCurrentMonthBillPercentageByType($typeId)
    {
        $bills_total = $this->getBillTotal();
        $rent = $this->getRent();
        $bill = $this->getBillsCurrentMonthByType($typeId);

        return ($bill/$bills_total)*100;
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
