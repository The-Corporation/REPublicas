<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RepublicaRepository;
use App\Models\Republica;
use App\Validators\RepublicaValidator;;

/**
 * Class RepublicaRepositoryEloquent
 * @package namespace App\Repositories;
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
