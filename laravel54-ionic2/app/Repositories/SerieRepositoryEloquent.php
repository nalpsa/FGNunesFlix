<?php

namespace FGNunesFlix\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FGNunesFlix\Repositories\SerieRepository;
use FGNunesFlix\Models\Serie;
use FGNunesFlix\Validators\SerieValidator;

/**
 * Class SerieRepositoryEloquent
 * @package namespace FGNunesFlix\Repositories;
 */
class SerieRepositoryEloquent extends BaseRepository implements SerieRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Serie::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
