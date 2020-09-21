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
      <div class="card mx-auto shadow p-3 mb-5 bg-white rounded w-75 p-3" style="width:  18rem;">
        <div class="card-body">
          <h5 class="card-title">Book</h5>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
            </div>
            <div class="form-group">
              <label for="body">Body</label>
              <textarea class="form-control" name="body" id="body" rows="5">{{ $book->body }}</textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="変更する">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
