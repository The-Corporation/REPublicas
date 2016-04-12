<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RepublicaAccountRepository;
use App\Models\RepublicaAccount;
use App\Validators\RepublicaAccountValidator;;

/**
 * Class RepublicaAccountRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RepublicaAccountRepositoryEloquent extends BaseRepository implements RepublicaAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RepublicaAccount::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
