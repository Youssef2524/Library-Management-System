<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\BorrowRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BorrowRecordService
{
   
      /*
      @param Book $bookId
      @return $borrowRecord
  */
     public function createBorrowRecord($bookId)
    {
        $book = Book::find($bookId);

        $alreadyBorrowed = BorrowRecord::where('book_id', $book->id)
                                       ->whereNull('returned_at')
                                       ->exists();

        if ($alreadyBorrowed) {
            throw new \Exception('The book is already borrowed and has not been returned yet.');
        }


        $borrowRecord = BorrowRecord::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'borrowed_at' => Carbon::now(),
            'due_date' => Carbon::now()->addDays(14),
        ]);
    
        return $borrowRecord;
    }

   
 /*
      @param Book $bookId
      @return $borrowRecord
  */
public function returnBorrowedBook($borrowId)
{
    $borrowRecord = BorrowRecord::find($borrowId);

    if (!$borrowRecord) {
        Log::error("Borrow record with ID {$borrowId} not found.");
        abort(404, 'Borrow record not found');
    }
    $borrowRecord->returned_at = now();
    $borrowRecord->due_date =null;

    $borrowRecord->save();

    return $borrowRecord;
}
 /*
      @param BorrowRecord $borrowRecord
      @return $borrowRecord
  */
    public function delete(BorrowRecord $borrowRecord)
    {
        $borrowRecord->delete();
    }
}




