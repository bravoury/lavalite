<?php

namespace Shopping\Seller\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class SellerPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SellerTransformer();
    }
}