<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        // فحص الصلاحيات باستخدام الـ Policy
        // Gate::authorize('update', $borrowRecord);

        $this->authorize('create', [Rating::class, $book]);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'rating' => $request->input('rating'),
        ]);

        return response()->json($rating, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
