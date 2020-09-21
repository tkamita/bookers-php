@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include('book.partials.sidebar')
    <div class="col-sm-8">
      <h1>Books</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Opinion</th>
            <th scope="col"></th>
          </tr>
        </thead>
        @foreach($books as $book)
          <tbody>
            <tr>
              <th scope="row" class="w-25"><img src="{{ asset('storage/profiles/'.$book->user->profile_image) }}" alt="" class="rounded-circle w-50"></th>
              <td><a href="{{ url('books/'.$book->id) }}" class="text-secondary">{{ $book->title }}</a></td>
              <td>{{ $book->body }}</td>
              <td></td>
            </tr>
          </tbody>
        @endforeach
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          {{ $books->links() }}
        </ul>
      </nav>
    </div>
  </div>
</div>
@endsection