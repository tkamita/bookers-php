@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include('book.partials.sidebar')
    <div class="col-sm-8">
      <h1>Users</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col"></th>
          </tr>
        </thead>
        @foreach($users as $user)
          <tbody>
            <tr>
              <th scope="row" class="w-25"><img src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="" class="rounded-circle w-50"></th>
              <td>{{ $user->name }}</td>
              <td><a href="{{ url('users/'.$user->id) }}" class="text-secondary">show</a></td>
            </tr>
          </tbody>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection