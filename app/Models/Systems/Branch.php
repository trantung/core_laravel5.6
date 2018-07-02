<?php

namespace App\Models\Systems;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Branch.
 *
 * @package namespace App\Models\Systems;
 */
class Branch extends Model implements Transformable {
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
