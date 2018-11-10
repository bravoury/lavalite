<?php

namespace Shopping\Seller;

use User;

class Seller
{
    /**
     * $seller object.
     */
    protected $seller;

    /**
     * Constructor.
     */
    public function __construct(\Shopping\Seller\Interfaces\SellerRepositoryInterface $seller)
    {
        $this->seller = $seller;
    }

    /**
     * Returns count of seller.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.seller.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->seller->pushCriteria(new \Litepie\Shopping\Repositories\Criteria\SellerUserCriteria());
        }

        $seller = $this->seller->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('seller::' . $view, compact('seller'))->render();
    }
}
