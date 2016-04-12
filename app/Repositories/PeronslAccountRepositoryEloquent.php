<?php

namespace Republicas\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Models\PeronslAccount;


/**
 * Class PeronslAccountRepositoryEloquent
 * @package namespace Republicas\Repositories;
 */
class PeronslAccountRepositoryEloquent extends BaseRepository implements PeronslAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PeronslAccount::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
