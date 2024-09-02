<?php
namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{

    /**
     * Determine whether the user can create a new book.
     */
    /*
    *@param User $user
     @return $user
    */

    public function create(User $user)
    {
                       // can admin create 

        return $user->roles_name === 'Admin';
    }

    /**
     * Determine whether the user can update the book.
     */
    /*
    *@param User $user
    *@param  Book $book
     @return $user
    */
    public function update(User $user, Book $book)
    {
                               // can admin create 

        if ($user->roles_name === 'Admin') {
            return true;
        }                       // can adminowner user 


        return $user->roles_name === 'user' && $user->id === $book->user_id;
       }

    /**
     * Determine whether the user can delete the book.
     */
     /*
    *@param User $user
    *@param  Book $book
     @return $user
    */
    public function delete(User $user, Book $book)
    {
        if ($user->roles_name === 'Admin') {
            return true;
        }

        return $user->roles_name === 'user' && $user->id === $book->user_id;
    }
}
