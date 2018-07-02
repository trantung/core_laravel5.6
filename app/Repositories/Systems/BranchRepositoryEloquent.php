<?php

namespace App\Repositories\Systems;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Systems\BranchRepository;
use App\Models\Systems\Branch;
use App\Validators\Systems\BranchValidator;

/**
 * Class BranchRepositoryEloquent.
 *
 * @package namespace App\Repositories\Systems;
 */
class BranchRepositoryEloquent extends BaseRepository implements BranchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Branch::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BranchValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
