<?php

namespace Republicas\Models;

use Zizaco\Entrust\EntrustRole;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}