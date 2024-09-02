<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Auth\Access\Response;

class RatingPolicy
{
  
    /**
     * Determine whether the user can create models.
     */
      /*
    *@param User $user
    *@param Book $book
     @return $book
    */
    public function create(User $user, Book $book): bool
    {
        // تحقق من أن المستخدم قد استعار الكتاب
        return $book->borrowRecords()
                    ->where('user_id', $user->id)
                    ->whereNull('returned_at')
                    ->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Rating $rating): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Rating $rating): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Rating $rating): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Rating $rating): bool
    {
        //
    }
}
