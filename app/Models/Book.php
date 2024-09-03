<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\BorrowRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'category','available','description', 'published_at'];


    // protected function casts(): array
    // {
    //     return [
    //         'available' => 'boolean',
    //     ];
    // }

    public function BorrowRecord()
    {
        return $this->hasMany(BorrowRecord::class);
    }
    public function rating()
{
    return $this->hasMany(Rating::class);
}

}
