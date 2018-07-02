<?php

namespace App\Transformers\Systems;

use App\Models\Systems\Branch;
use League\Fractal\TransformerAbstract;

/**
 * Class BranchTransformer.
 *
 * @package namespace App\Transformers\Systems;
 */
class BranchTransformer extends TransformerAbstract {
    /**
     * Transform the Branch entity.
     *
     * @param \App\Models\Systems\Branch $model
     *
     * @return array
     */
    public function transform(Branch $model) {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
