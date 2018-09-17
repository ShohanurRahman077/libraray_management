<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\BorrowedBooks;


class BorrowedBooksController extends BaseController
{

    public function borrowed_books(){



        $userId = Auth::id();
     //   var_dump($userId);
        $email = Auth::user()->email;
        $roll_id = Auth::user()->roll_id;
     //   var_dump($roll_id);
        $books = DB::table('borrowed_books')
            ->select('book_name','author','issued_date','expiry_date')
            ->join('category_wise_books', 'category_wise_books.id', '=', 'borrowed_books.borrowed_book')
            ->where('issued_student', '=', $roll_id)
            ->get();


         return view('borrowed_books', compact('books','roll_id'));



    }
}