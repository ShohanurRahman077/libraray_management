<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class SearchBooksController extends BaseController
{
    public function index(Request $request)
    {

        if ($request->isMethod('post')) {
            $search_data=$request->book_name;
            $books = DB::table('category_wise_books')
                ->select('book_name','author','stock')
                ->where('book_name', 'like', $search_data)
                ->get();
            return view('search_books',compact('books'));

        }else{
            $search_data=$request->book_name;
            $books = DB::table('category_wise_books')
                ->select('book_name','author','stock')
                ->where('book_name', 'like', $search_data)
                ->get();
            return view('search_books',compact('books'));
        }




    }
    public function search_book()
    {
        return view('search_books');
    }

}
