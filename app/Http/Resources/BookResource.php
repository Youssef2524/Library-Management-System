<?php

namespace App\Http\Resources;
use App\Models\User;
use App\Models\Rating;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\RatingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    protected $averageRating;

    public function __construct($resource, $averageRating = null)
    {
        parent::__construct($resource);
        $this->averageRating = $averageRating;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            // 'rating' => $this->Rating->rating,
            'author' => $this->author,
            'category' => $this->category,
            // 'available' => $this->available,
            
            'average_rating' => $this->averageRating, 
            'description ' => $this->description ,
            'published_at' => $this->published_at,
            'rating' => RatingResource::collection($this->whenLoaded('rating')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
         ];}
}
