<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingService
{
   
    public function createRating(array $ratingData)
{
    $user = Auth::user()->id;

    $rating = Rating::create([
        'book_id' => $ratingData['book_id'], 
        'user_id' => $user,
        'rating' => $ratingData['rating'],  
    ]);

    return $rating;

    }

    public function updateRating(Rating $rating, array $data)
    {
        $rating->update([
            'book_id' => $data['book_id']??$rating->book_id,
            'user_id' => $data['user_id']??$rating->user_id,
            'rating' =>$data['rating']??$rating->rating,
        ]);
        return $rating;
    }
    public function deleteRating(Rating $rating)
    {
        $rating->delete();
    }
}




