<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LibraryController extends Controller
{
    public function getLibrary(){
    	$user = Auth::user();

    	$books = $user->books()->get();
    	return view('library.library',compact('books'));
    }

    public function create(){

    	return view('library.create');
    }

    public function store(Request $request){

    	$user = Auth::user();

    	$request->validate([
    		'name' => 'required',
    		'isbn' => 'sometimes|string|size:10|unique:books,isbn',
    		'year' => 'required|digits:4|integer',
    		'description' => 'required'
     	]);

    	$book = new Book();
    	if( $request->hasFile('imageFile')) {
		    $image = $request->file('imageFile');
		    $filename = time() . '.' . $image->getClientOriginalExtension();
		    $location = public_path('images/'.$filename);
		    Image::make($image)->resize(400,800)->save($location);
		    $book->image = $filename;
		}

		$book->name = $request->input('name');
		$book->isbn = $request->input('isbn');
		$book->year = $request->input('year');
		$book->description = $request->input('description');

    	$book->save();
    	$book->users()->attach($user->id);

    	return redirect()->route('library.library');

    }

    public function viewBook($id){

    	$book = Book::findOrFail($id);
    	return view('library.viewBook',['book'=>$book]);
    }

    public function editBook($id){
    	
    	$book = Book::findOrFail($id);
    	return view('library.editBook',['book'=>$book]);
    }

    public function updateBook(Request $request, $id){

    	$user = Auth::user();
    	$request->validate([
    		'name' => 'required',
    		'isbn' => 'sometimes|string|size:10|unique:books,isbn',
    		'year' => 'required|digits:4|integer',
    		'description' => 'required'
     	]);

    	$book = Book::findOrFail($id);
    	if( $request->hasFile('imageFile')) {
		    $image = $request->file('imageFile');
		    $filename = time() . '.' . $image->getClientOriginalExtension();
		    $location = public_path('images/'.$filename);
		    Image::make($image)->resize(200,400)->save($location);
		    $oldImage = $book->image;
		    $book->image = $filename;
		    Storage::delete($oldImage);
		}

		$book->name = $request->input('name');
		$book->isbn = $request->input('isbn');
		$book->year = $request->input('year');
		$book->description = $request->input('description');

    	$book->update();
    	$book->users()->sync($user->id);

    	return redirect()->route('library.library');
    }

    public function destroy($id){
        $user = Auth::user();
        $user->books()->detach($id);
        session()->flash('message', 'The book '.Book::findOrFail($id)->name.' was deleted!');
        return redirect()->route('library.library');
    }

    public function addToLibrary($id){
        $user = Auth::user();

        $book = Book::findOrFail($id);
        if (! $book->users->contains($user->id)) {
            $book->users()->save($user);
        }
        session()->flash('message', 'The book '.$book->name. ' was added to your library!');
        return redirect()->route('homepage');
    }
}
