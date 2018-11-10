<?php

namespace Shopping\Seller\Policies;

use Litepie\User\Contracts\UserPolicy;
use Shopping\Seller\Models\Seller;

class SellerPolicy
{

    /**
     * Determine if the given user can view the seller.
     *
     * @param UserPolicy $user
     * @param Seller $seller
     *
     * @return bool
     */
    public function view(UserPolicy $user, Seller $seller)
    {
        if ($user->canDo('seller.seller.view') && $user->isAdmin()) {
            return true;
        }

        return $seller->user_id == user_id() && $seller->user_type == user_type();
    }

    /**
     * Determine if the given user can create a seller.
     *
     * @param UserPolicy $user
     * @param Seller $seller
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('seller.seller.create');
    }

    /**
     * Determine if the given user can update the given seller.
     *
     * @param UserPolicy $user
     * @param Seller $seller
     *
     * @return bool
     */
    public function update(UserPolicy $user, Seller $seller)
    {
        if ($user->canDo('seller.seller.edit') && $user->isAdmin()) {
            return true;
        }

        return $seller->user_id == user_id() && $seller->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given seller.
     *
     * @param UserPolicy $user
     * @param Seller $seller
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Seller $seller)
    {
        return $seller->user_id == user_id() && $seller->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given seller.
     *
     * @param UserPolicy $user
     * @param Seller $seller
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Seller $seller)
    {
        if ($user->canDo('seller.seller.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given seller.
     *
     * @param UserPolicy $user
     * @param Seller $seller
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Seller $seller)
    {
        if ($user->canDo('seller.seller.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
