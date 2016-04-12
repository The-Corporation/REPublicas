<?php

namespace Republicas\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PeronslAccount extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
