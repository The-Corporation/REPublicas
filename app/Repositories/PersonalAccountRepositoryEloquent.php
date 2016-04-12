<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PersonalAccountRepository;
use App\Models\PersonalAccount;
use App\Validators\PersonalAccountValidator;;

/**
 * Class PersonalAccountRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PersonalAccountRepositoryEloquent extends BaseRepository implements PersonalAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PersonalAccount::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
