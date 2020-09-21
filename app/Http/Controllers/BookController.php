<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

// use Validator;

// use Illuminate\Support\MessageBag;
// use Illuminate\View\Middleware\ShareErrorsFromSession;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::all();
        $books = Book::paginate(8);
        $user = Auth::user();
        $params = [
            'books' => $books,
            'user' => $user,
        ];
        // $books = Book::paginate(5);
        // return view('book.index', ['books' => $books]);
        return view('book.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'bail|required|max:40',
            'body' => 'bail|required|max:200',
        ]);
        $book = new Book;
        $form = $request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        // return redirect()->route('book', [$book]);
        // return redirect('/books');
        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $user = $book->user;
        // $user = User::find($id);
        // $user = Auth::user();
        $params = [
            'book' => $book,
            'user' => $user,
        ];
        // return view('book.show', ['book' => $book]);
        return view('book.show', $params );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $user = Auth::user();
        $params = [
            'book' => $book,
            'user' => $user,
        ];
        // return view('user.edit', ['user' => $user]);
        return view('book.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'bail|required|max:40',
            'body' => 'bail|required|max:200',
        ]);
        $book = Book::find($id);
        $form = $request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        return redirect()->route('books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $book = Book::find($id)->delete();
        $book = Book::find($id);
        $book->delete();
        return redirect('/home');
    }
}
