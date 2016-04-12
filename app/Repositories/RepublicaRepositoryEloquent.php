<?php

namespace Republicas\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Republicas\Models\Republica;


/**
 * Class RepublicaRepositoryEloquent
 * @package namespace Republicas\Repositories;
 */
class RepublicaRepositoryEloquent extends BaseRepository implements RepublicaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Republica::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
