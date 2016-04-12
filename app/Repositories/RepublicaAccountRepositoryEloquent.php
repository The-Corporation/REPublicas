<?php

namespace Republicas\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Models\RepublicaAccount;

/**
 * Class RepublicaAccountRepositoryEloquent
 * @package namespace Republicas\Repositories;
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
