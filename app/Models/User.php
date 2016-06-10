<?php

namespace Republicas\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Republicas\Traits\ImageUploadTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait, ImageUploadTrait;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'password',
        'photo'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
     * Relationships
     */
    public function republic()
    {
        return $this->hasOne(Republic::class);
    }

    public function republics()
    {
        return $this->belongsToMany(Republic::class, 'republic_users');
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    /**
     * Sets the default photo.
     */
    public function setDefaultPhoto()
    {
        $this->photo = 'users/avatar.png';
    }
}
