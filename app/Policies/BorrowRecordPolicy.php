<?php

namespace App\Policies;

use App\Models\BorrowRecord;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BorrowRecordPolicy
{
   
    /**
     * Determine whether the user can view the model.
     */
     /*
    *@param User $user
    
     @return $user
    */
    public function view(User $user): bool
    {
               // can admin or owner user

        return $user->roles_name === 'Admin' ||$user->roles_name === 'user';

    }

    /**
     * Determine whether the user can create models.
     */
     /*
    *@param User $user
    
     @return $user
    */
    public function create(User $user): bool
    {
               // can admin or owner user

        return $user->roles_name === 'Admin' ||$user->roles_name === 'user';
    }

    /**
     * Determine whether the user can update the model.
     */
     /*
    *@param User $user
    
     @return $borrowRecord
    */
    public function update(User $user, BorrowRecord $borrowRecord): bool
    {
               // can admin or owner BorrowRecord

        return $user->roles_name === 'Admin' || $user->id === $borrowRecord->user_id;

    }

    /**
     * Determine whether the user can delete the model.
     */  /*
    *@param User $user
    
     @return $borrowRecord
    */
    
    public function delete(User $user, BorrowRecord $borrowRecord): bool
    {
                       // can admin or owner BorrowRecord

        return $user->roles_name === 'Admin' || $user->id === $borrowRecord->user_id;
    }

}
