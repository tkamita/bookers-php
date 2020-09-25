<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $id) {
        // $validatedData = $request->validate([
        //     'body' => 'bail|required|max:200',
        // ]);
        // $comment = new Comment;
        // $form = $request->all();
        // unset($form['_token']);
        // dd($comment);
        // $comment->fill($form)->save();
        Comment::create([
            'user_id' => Auth::id(),
            'book_id' => $id,
            'body' => $request->body
        ]);
        return redirect()->back();
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
