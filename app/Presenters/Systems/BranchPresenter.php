<?php

namespace App\Presenters\Systems;

use App\Transformers\Systems\BranchTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BranchPresenter.
 *
 * @package namespace App\Presenters\Systems;
 */
class BranchPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BranchTransformer();
    }
}
