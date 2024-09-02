<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
      /*
    *@param User $user
     @return $book
    */
    public function viewAny(User $user)
    {
               // can admin 

        return $user->roles_name === 'Admin';
    }

    /**
     * Determine whether the user can view the model.
     */
       /*
    *@param User $user
    *@param User $model
     @return $book
    */
    public function view(User $user, User $model)
    {       // can admin or owner user

        return $user->roles_name === 'Admin' || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     */
       /*
    *@param User $user
     @return $book
    */
    public function create(User $user)
    {
               // can admin

        return $user->roles_name === 'Admin';
    }

    /**
     * Determine whether the user can update the model.
     */
      /*
    *@param User $user
    *@param User $model
     @return $book
    */
    public function update(User $user, User $model)
    {
               // can admin or owner user

        return $user->roles_name === 'Admin' || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
      /*
    *@param User $user
    *@param User $model
     @return $book
    */
    public function delete(User $user, User $model)
    {
       // can admin or owner user
        return $user->roles_name === 'Admin' && $user->id !== $model->id;
    }

}
