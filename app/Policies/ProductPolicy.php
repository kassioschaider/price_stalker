<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Product $product)
    {
        return $user->id == $product->user_id;
    }

    public function create(User $user)
    {
        return $user->type === 'cadastro' || 'admin';
    }

    public function analyse(User $user)
    {
        return $user->type === 'analise' || 'admin';
    }

    public function edit(User $user)
    {
        return $user->type === $user->id;
    }
}
