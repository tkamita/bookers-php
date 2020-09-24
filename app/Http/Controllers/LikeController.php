<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\User;
use App\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {
            Like::favorite($request->book_id);
            return back();
    }
    
    // public function store($id) {
        // \Auth::user()->favorite($id);
        // $book = Book::find($id);
        // Like::create(
        //     array(
        //       'user_id' => Auth::user()->id,
        //       'book_id' => $book->id
        //     )
        //   );
        // Like::create([
        // 'book_id' => $book->id,
        // 'user_id' => Auth::id(),
        // ]);

        // session()->flash('success', 'You Liked the Reply.');

        
        // return back();
    // }

    public function destroy($id) {
        \Auth::user()->unfavorite($id);
        return back();
    }
}
