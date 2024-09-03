<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BorrowRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'book_id' => $this->book_id,
            'user_id' => $this->user_id,
            'username' => $this->user->name,
            'borrowed_at' => $this->borrowed_at,
            'due_date' => $this->due_date,
            'returned_at' => $this->returned_at,
            // 'book' => new BookResource($this->whenLoaded('book')),
            // 'user' => new UserResource($this->whenLoaded('user')),
        ];    }
}
