<?php
namespace App\Services;
use App\Models\Book;


class BookService{

    /*
      @param array $data
      @return $books
  */
    public function getBook(array $data){

        $author = $data['author'] ?? null;
        $category = $data['category'] ?? null;
        $available = $data['available']??true;
        $books = Book::query();
       
        if ($author) {
            $books->where('author', $author);
        }
        if ($category) {
            $books->where('category', $category);
        }



        if ($available !== false) {
            $books->where('available', $available);
        }else{
            return response()->json(['message' => 'Available parameter is missing'], 400);
        }


        return $books->paginate(10); 

    }

     /*
      @param array $data
      @return $books
  */
    public function createBook(array $data)
    {
         
        return Book::create([
            'title' => $data['title'],
            'author' => $data['author'],
            'description' =>$data['description'],
            'category' =>$data['category'],
            'available' =>false,
            'published_at' => now(),
        ]);
    }

     /*
      @param array $data
      @param Book $book
      @return $books
  */
    public function updateBook(Book $book, array $data)
    {
        $book->update([
            'title' => $data['title']??$data->title,
            'author' => $data['author']??$data->author,
            'description' =>$data['description']??$data->description,
            'category' =>$data['category'],
            'published_at' => now(),
        ]);
        return $book;
    }

      /*
      @param Book $book
      @return $book
  */
    public function deleteBook(Book $book)
    {
        $book->delete();
    }

}
