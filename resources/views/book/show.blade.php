@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('msg_success'))
    <div class="flash_message">
      {{ session('msg_success') }}
    </div>
  @endif
  <div class="row">
    @include('book.partials.sidebar', ['user' => $user])
    <div class="col-sm-8">
      <h1>Book Details</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Opinion</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="w-25"><img src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="" class="rounded-circle w-50"></th>
            <td>{{ $book->title }}</td>
            <td>{{ $book->body }}</td>
            @if($book->user_id === auth()->user()->id)
              <td>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                  <a class="btn btn-info" href="{{ route('books.edit', $book->id) }}" >Edit</a>
                  <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <input class="btn btn-danger" type="submit" value="delete">
                  </form>
                </div>
              </td>
            @else
              <td>
                <div>
                  @if($book->is_liked_by_auth_user())
                    <a href="{{ route('book.unlike', ['id' => $book->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $book->likes->count() }}</span></a>
                  @else
                    <a href="{{ route('book.like', ['id' => $book->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $book->likes->count() }}</span></a>
                  @endif
                </div>
              </td>
            @endif
          </tr>
        </tbody>
      </table>
      @foreach($book->comments as $comment)
        <div class="card mb-3">
          <div class="card-header">
            <div class="row no-gutters">
              <div class="col-md-2 h-25">
                <img src="{{ asset('storage/profiles/'.$comment->user->profile_image) }}" alt="" class="rounded-circle w-50">
              </div>
              <div class="col-md-10">
                <div class="card-body p-0">
                  {{ $comment->user->name }}
                  @if($comment->user_id === auth()->user()->id)
                    <form action="{{ route('delete.comment', $comment->id) }}" method="POST" enctype="multipart/form-data">
                      @method('DELETE')
                      @csrf
                      <input type="hidden" name="id" value="{{ $comment->id }}">
                      <input class="btn btn-danger float-right" type="submit" value="delete">
                    </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <p class="card-text">{!! nl2br(e($comment->body)) !!}</p>
          </div>
          <div class="card-footer text-muted clearfix">
            {{ $comment->created_at }}
          </div>
        </div>
      @endforeach
      <form action="{{ route('book.comment', ['id' => $book->id]) }}" method="post" enctype="multipart/form-data" class="clearfix">
        @csrf
        <div class="form-group">
          <label for="comment">Comment</label>
          <textarea class="form-control" id="comment" name="body" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection
