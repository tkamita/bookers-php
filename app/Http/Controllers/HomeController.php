<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use  Illuminate\Database\Eloquent\Collection;
// use App\Book;

// use Illuminate\Support\MessageBag;
// use Illuminate\View\Middleware\ShareErrorsFromSession;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // $books = Book::paginate(5);
        // $books = Book::where('user_id', $user) -> get();
        // $items = Post::with('user')->get();
        // $books = Book::with('user')->get();
        // $params = [
        //     'user' => $user,
        //     'books' => $books,
        // ];
        // return view('home', $params);
        $user->books = $user->books()->paginate(8);
        return view('home', ['user' => $user]);
    }
}
