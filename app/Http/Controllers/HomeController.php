<?php

namespace App\Http\Controllers;
use Auth;
use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{	
    public function index(){
    	$books = Book::all();
    	foreach ($books as $book) {
    		if($book->users()->where('user_id',Auth::user()->id)->exists()){
    			$book->added = true;
    		}else{
    			$book->added = false;
    		}
    	}
    	return view('homepage',compact('books'));
    }
}
